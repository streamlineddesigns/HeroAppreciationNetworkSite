<?php

namespace App\Controllers\Admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;
use App\Models\OrgTemplateAboutSection;
use App\Models\OrgTemplateHeroSection;
use App\Models\ExtraText;
use App\Models\Details;
use App\Models\OrgTemplateDetailsSection;
use App\Models\SocialMedias;
use App\Models\SectionIcons;
use App\Models\Donations;

class OrganizationController extends Controller
{
    public function show($request, $response, $id)
    {
        $authorized = $this->container->get('auth')->hasSuperUserPrivileges();
        if (! $authorized) {
            $authorized = (isset($_SESSION['user']) && $id == $_SESSION['user']['org_id']) ? true : false;
        }

        if ($authorized) {
            $view = 'Admin/Organizations/show.twig';
            $organization = Organizations::select("organizations.*", "extra_text.detail_one", "extra_text.detail_two", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url", "details.detail_text")
                                           ->leftJoin('extra_text', 'extra_text.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_details_section', 'org_template_details_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('details', 'org_template_details_section.detail_id', '=', 'details.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->where('organizations.id', $id)->get();
            
            $detail_texts = array();
            for($i = 0; $i < count($organization); $i++) {
                array_push($detail_texts, $organization[$i]->detail_text);
                
            }
            $counter = 0;

            $donations = Donations::where('recipient_organization_id', $id)->get();
            $donations_total = 0;
            for($j = 0; $j < count($donations); $j++) {
                $donations_total += $donations[$j]->amount;
            }

            return $this->container->get('view')->render($response, $view, ['organization' => $organization, 'detail_texts' => $detail_texts, 'counter' => $counter, 'donations' => $donations, 'donations_total' => $donations_total ]);
        } else {
            $this->container->get('flash')->addMessage('error', 'Could not find organization... Try again?');
            return $response->withStatus(302)->withHeader('Location', "/user/profile");
        }
    }

    public function edit($request, $response, $id)
    {
        $authorized = $this->container->get('auth')->hasSuperUserPrivileges();
        if (! $authorized) {
            $authorized = (isset($_SESSION['user']) && $id == $_SESSION['user']['org_id']) ? true : false;
        }

        if ($authorized) {
            $view = 'Admin/Organizations/edit.twig';
            $organization = Organizations::select("organizations.*", "extra_text.detail_one", "extra_text.detail_two", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url", "details.detail_text", "details.id as details_id")
                                           ->leftJoin('extra_text', 'extra_text.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_details_section', 'org_template_details_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('details', 'org_template_details_section.detail_id', '=', 'details.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->where('organizations.id', $id)->get();

            $detail_texts = array();
            for($i = 0; $i < count($organization); $i++) {
                array_push($detail_texts, ['details_id' => $organization[$i]->details_id, 'detail_text' => $organization[$i]->detail_text]);
            }
            $counter = 0;

            $donations = Donations::where('recipient_organization_id', $id)->get();
            $donations_total = 0;
            for($j = 0; $j < count($donations); $j++) {
                $donations_total += $donations[$j]->amount;
            }

            /*$section_icons = SectionIcons::select("section_icons.*")
                                          ->leftJoin("social_medias", 'social_medias.section_icon_id', '=', 'section_icons.id')
                                          ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.social_media_id', '=', 'social_medias.id')
                                          ->where('org_template_social_media_section.organization_id', $id)->get();
            
            //->where('org_template_social_media_section.organization_id', $id)
            $response->getBody()->write(json_encode($section_icons));
            return $response;*/
                                           
            return $this->container->get('view')->render($response, $view, ['organization' => $organization, 'detail_texts' => $detail_texts, 'counter' => $counter, 'donations' => $donations, 'donations_total' => $donations_total ]);
        } else {
            $this->container->get('flash')->addMessage('error', 'Could not find organization... Try again?');
            return $response->withStatus(302)->withHeader('Location', "/user/profile");
        }
    }

    /*
     * Update Endpoint
     */
    public function update($request, $response, $id)
    {
        //Upload all images & get their filenames

        $directory = $this->container->get('settings')['upload_directory']['organizations'] . $id . "/";
        $uploadedFiles = $request->getUploadedFiles();
        $files = ['hero_img_url' => "", 'featured_img_url' => "", 'about_img_url' => "", 'contact_img_url' => ""];
        $keys = array_keys($files);

        for($i = 0; $i < count($keys); $i++) {
            $key = $keys[$i];
            $uploadedFile = $uploadedFiles[$key];
            if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                $filename = $this->moveUploadedFile($directory, $uploadedFile);
                $files[$key] = $filename;
            }
        }

        //Get all form data

        $form_data = $request->getParsedBody();
        $name = $form_data['name'];
        $cta_text = $form_data['cta_text'];
        $about_us_text = $form_data['about_us_text'];
        $phone = $form_data['phone'];
        $email = $form_data['email'];
        $address = $form_data['address'];
        $detail_one = $form_data['detail_one'];
        $detail_two = $form_data['detail_two'];
        $detail_texts = json_decode($form_data['detail_texts']);
        $is_invisible = (isset($form_data['is_invisible'])) ? 1 : 0;
        
        //Create & Update Models using form data & file names
        $organization = Organizations::find($id);
        if ($organization->id != null) {
            $organization->name = $name;
            $organization->address = $address;
            $organization->email = $email;
            $organization->phone = $phone;
            $organization->is_invisible = $is_invisible;
            if (isset($files["contact_img_url"]) && ! empty($files["contact_img_url"])) {
                if ($organization->contact_img_url != null) {
                    try{
                        if (file_exists($directory . $organization->contact_img_url)) unlink($directory . $organization->contact_img_url);
                    } catch(exception $e) {

                    }
                }
                $organization->contact_img_url = $files["contact_img_url"];
            }
            $organization->save();
        }
        
        $org_template_about_section = OrgTemplateAboutSection::where("organization_id", $id)->first();
        //if all ready exists
        if (isset($org_template_about_section->id)) {
            $org_template_about_section->about_us_text = $about_us_text;
            if (isset($files['about_img_url']) && ! empty($files["about_img_url"])) {
                if ($org_template_about_section->about_img_url != null) {
                    try{
                        if (file_exists($directory . $org_template_about_section->about_img_url)) unlink($directory . $org_template_about_section->about_img_url);
                    } catch(exception $e) {

                    }
                }
                $org_template_about_section->about_img_url = $files['about_img_url'];
            }
            $org_template_about_section->save();
        //if needs creating
        } else {
            if (isset($files['about_img_url']) && ! empty($files["about_img_url"])) {
                $OrgTemplateAboutSection = OrgTemplateAboutSection::create([
                    "organization_id" => $id,
                    "about_us_text" => $about_us_text,
                    "about_img_url" => $files['about_img_url'],
                    "is_invisible" => 0,
                ]);
            } else {
                $OrgTemplateAboutSection = OrgTemplateAboutSection::create([
                    "organization_id" => $id,
                    "about_us_text" => $about_us_text,
                    "is_invisible" => 0,
                ]);
            }
        }

        $org_template_hero_section = OrgTemplateHeroSection::where("organization_id", $id)->first();
        if (isset($org_template_hero_section->id)) {
            $org_template_hero_section->cta_text = $cta_text;
            if (isset($files["hero_img_url"]) && ! empty($files["hero_img_url"])) {
                if ($org_template_hero_section->hero_img_url != null) {
                    
                    try{
                        if (file_exists($directory . $org_template_hero_section->hero_img_url)) unlink($directory . $org_template_hero_section->hero_img_url);
                    } catch(Exception $e) {

                    }
                }
                $org_template_hero_section->hero_img_url = $files["hero_img_url"];
            }
            if (isset($files["featured_img_url"]) && ! empty($files["featured_img_url"])) {
                if ($org_template_hero_section->featured_img_url != null) {
                    
                    try{
                        if (file_exists($directory . $org_template_hero_section->featured_img_url)) unlink($directory . $org_template_hero_section->featured_img_url);
                    } catch(exception $e) {

                    }
                }
                $org_template_hero_section->featured_img_url = $files["featured_img_url"];
            }
            $org_template_hero_section->save();
        }  else {
            if ( (isset($files["hero_img_url"]) && ! empty($files["hero_img_url"]) ) && (isset($files["featured_img_url"]) && ! empty($files["featured_img_url"])) ) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "hero_img_url" => $files["hero_img_url"],
                    "featured_img_url" => $files["featured_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 0,
                ]);
            } else if ((isset($files["hero_img_url"]) && ! empty($files["hero_img_url"]) ) && empty($files["featured_img_url"])) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "hero_img_url" => $files["hero_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 0,
                ]);
            } else if (empty($files["hero_img_url"]) && (isset($files["featured_img_url"]) && ! empty($files["featured_img_url"]) ) ) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "featured_img_url" => $files["featured_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 0,
                ]);
            }
            
        }

        $extra_text = ExtraText::where("organization_id", $id)->first();
        if (isset($extra_text->id)) {
            $extra_text->detail_one = $detail_one;
            $extra_text->detail_two = $detail_two;
            $extra_text->save();
        }  else {
            $extra_text = ExtraText::create([
                "organization_id" => $id,
                "detail_one" => $detail_one,
                "detail_two" => $detail_two,
            ]);
        }

        for($i = 0; $i < count($detail_texts); $i++) {
            if($detail_texts[$i]->bHasID) {
                $detail = Details::where("id", $detail_texts[$i]->id)->first();
                if (isset($detail->id)) {
                    $detail->detail_text = $detail_texts[$i]->detail_text;
                    $detail->save();
                } else {
                    $detail = Details::create([
                        "detail_text" => $detail_texts[$i]->detail_text,
                    ]);
                    
                    $org_template_details_section = OrgTemplateDetailsSection::create([
                        "organization_id" => $id,
                        "detail_id" => $detail->id,
                        "is_invisible" => 0,
                    ]);
                }
            } else if (! $detail_texts[$i]->bHasID && $detail_texts[$i]->bHasValue) {
                $detail = Details::create([
                    "detail_text" => $detail_texts[$i]->detail_text,
                ]);
                
                $org_template_details_section = OrgTemplateDetailsSection::create([
                    "organization_id" => $id,
                    "detail_id" => $detail->id,
                    "is_invisible" => 0,
                ]);
            }
        }

        $this->container->get('flash')->addMessage('success', 'Successfully updated organization!');
        return $response->withStatus(302)->withHeader('Location', "/admin/organizations/$id");
    }

    function moveUploadedFile($directory, $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        $uploadedFile->moveTo($directory . $filename);
        return $filename;
    }
}