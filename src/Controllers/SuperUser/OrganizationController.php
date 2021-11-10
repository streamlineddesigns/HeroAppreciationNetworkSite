<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;
use App\Models\Users;
use App\Models\UserRoles;
use App\Models\OrgTemplateAboutSection;
use App\Models\OrgTemplateHeroSection;
use App\Models\ExtraText;
use App\Models\Details;
use App\Models\OrgTemplateDetailsSection;
use App\Models\OrganizationUsers;

class OrganizationController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'SuperUser/Organizations/index.twig';
        $organizations = Organizations::orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['organizations' => $organizations]);
    }

    /*
     * Create View
     */
    public function create($request, $response)
    {
        $view = 'SuperUser/Organizations/create.twig';
        return $this->container->get('view')->render($response, $view);
    }

    public function store($request, $response)
    {
        $user_create_result = $this->storeUserData($request, $response);

        if ($user_create_result) {
            
            $organization_create_result = $this->storeOrganizationData($request, $response);

            if ($organization_create_result) {
                $organization_user = OrganizationUsers::create([
                    "organization_id" => $organization_create_result,
                    "user_id" => $user_create_result,
                ]);
                $this->container->get('flash')->addMessage('success', 'Successfully created organization and admin!');
            }

        } else {
            return $response->withStatus(302)->withHeader('Location', '/superuser/organizations/create');
        }

        return $response->withStatus(302)->withHeader('Location', '/superuser/organizations');
    }

    /*
     * Create User Endpoint
     */
    protected function storeUserData($request, $response)
    {        
        $result = false;
        $form_data = $request->getParsedBody();
        $fname = $form_data['fname'];
        $lname = $form_data['lname'];
        $email = $form_data['user_email'];
        $password = $form_data['password'];
        $confirm_password = $form_data['confirm_password'];

        $passwords_match = ($password == $confirm_password) ? true : false;

        //password inputs match
        if ($passwords_match) {

            $email_in_use = Users::where('email', $email)->first();

            //email isn't being used
            if (! $email_in_use) {
                $user = Users::create([
                    "fname" => $fname,
                    "lname" => $lname,
                    "email" => $email,
                    "password" => hash("sha256", $password),
                ]);

                $user_role = UserRoles::create([
                    "user_id" => $user->id,
                    "role_id" => 2,//ADMIN
                ]);

                //user created
                if ($user->id != null) {
                    //make user directory
                    $directory = $this->container->get('settings')['upload_directory']['users'] . $user->id;
                    if (! is_dir($directory)) {
                        mkdir($directory);
                    }

                    //$this->container->get('flash')->addMessage('success', 'Successfully created account!');
                    $result = $user->id;

                //USER NOT CREATED
                } else {
                    $this->container->get('flash')->addMessage('error', "User could not be created... Try again?");
                }
            
            //EMAIL BEING USED
            } else {
                $this->container->get('flash')->addMessage('error', 'Email all ready in use... Try again?');
            }

        //PASSWORD DONT MATCH
        } else {
            $this->container->get('flash')->addMessage('error', "Passwords did not match... Try again?");
        }

        return $result;
    }

    /*
     * Organization
     */
    protected function storeOrganizationData($request, $response)
    {
        $result = false;
        $uploadedFiles = $request->getUploadedFiles();
        $files = ['hero_img_url' => "", 'featured_img_url' => "", 'about_img_url' => "", 'contact_img_url' => ""];
        $keys = array_keys($files);


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
        $is_invisible = (isset($form_data['is_invisible'])) ? 0 : 1;//have to flip it because the form input is opposite of boolean


        //CREATE Organization
        $Organization = Organizations::create([
            "name" => $name,
            "address" => $address,
            "email" => $email,
            "phone" => $phone,
            "is_invisible" => $is_invisible,
        ]);


        if ($Organization->id != null) {
            $id = $Organization->id;

            //CREATE Files
            $directory = $this->container->get('settings')['upload_directory']['organizations'] . $id . "/";
            if (! is_dir($directory)) {
                mkdir($directory);
            }
            for($i = 0; $i < count($keys); $i++) {
                $key = $keys[$i];
                $uploadedFile = $uploadedFiles[$key];
                if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                    $filename = $this->moveUploadedFile($directory, $uploadedFile);
                    $files[$key] = $filename;
                }
            }

            //UPDATE Organization
            if (isset($files["contact_img_url"]) && ! empty($files["contact_img_url"])) {
                $Organization->contact_img_url = $files["contact_img_url"];
                $Organization->save();
            }

            //CREATE OrgTemplateAboutSection
            if (isset($files['about_img_url']) && ! empty($files["about_img_url"])) {
                $OrgTemplateAboutSection = OrgTemplateAboutSection::create([
                    "organization_id" => $id,
                    "about_us_text" => $about_us_text,
                    "about_img_url" => $files['about_img_url'],
                    "is_invisible" => 1,
                ]);
            } else {
                $OrgTemplateAboutSection = OrgTemplateAboutSection::create([
                    "organization_id" => $id,
                    "about_us_text" => $about_us_text,
                    "is_invisible" => 1,
                ]);
            }

            //OrgTemplateHeroSection
            if ( (isset($files["hero_img_url"]) && ! empty($files["hero_img_url"]) ) && (isset($files["featured_img_url"]) && ! empty($files["featured_img_url"])) ) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "hero_img_url" => $files["hero_img_url"],
                    "featured_img_url" => $files["featured_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 1,
                ]);
            } else if ((isset($files["hero_img_url"]) && ! empty($files["hero_img_url"]) ) && empty($files["featured_img_url"])) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "hero_img_url" => $files["hero_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 1,
                ]);
            } else if (empty($files["hero_img_url"]) && (isset($files["featured_img_url"]) && ! empty($files["featured_img_url"]) ) ) {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "featured_img_url" => $files["featured_img_url"],
                    "cta_text" => $cta_text,
                    "is_invisible" => 1,
                ]);
            } else {
                $org_template_hero_section = OrgTemplateHeroSection::create([
                    "organization_id" => $id,
                    "featured_img_url" => null,
                    "cta_text" => $cta_text,
                    "is_invisible" => 1,
                ]);
            }

            //CREATE ExtraText
            $extra_text = ExtraText::create([
                "organization_id" => $id,
                "detail_one" => $detail_one,
                "detail_two" => $detail_two,
            ]);

            //CREATE Detail Text
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
                            "is_invisible" => 1,
                        ]);
                    }
                } else if (! $detail_texts[$i]->bHasID && $detail_texts[$i]->bHasValue) {
                    $detail = Details::create([
                        "detail_text" => $detail_texts[$i]->detail_text,
                    ]);
                    
                    $org_template_details_section = OrgTemplateDetailsSection::create([
                        "organization_id" => $id,
                        "detail_id" => $detail->id,
                        "is_invisible" => 1,
                    ]);
                }
            }
            
            //$this->container->get('flash')->addMessage('success', 'Successfully created organization!');
            $result = $id;
        } else {
            $this->container->get('flash')->addMessage('error', 'Failed to create organization... Try again?');
        }

        return $result;
    }

    protected function moveUploadedFile($directory, $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        $uploadedFile->moveTo($directory . $filename);
        return $filename;
    }
}