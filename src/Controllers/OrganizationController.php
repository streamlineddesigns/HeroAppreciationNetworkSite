<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Organizations;
use App\Models\Donations;

class OrganizationController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Organizations/index.twig';
        $organizations = Organizations::select("organizations.*", "extra_text.detail_one", "extra_text.detail_two", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url")
                                           ->leftJoin('extra_text', 'extra_text.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->get();
        return $this->container->get('view')->render($response, $view, ['organizations' => $organizations]);
    }

    /*
     * Show View
     */
    public function show($request, $response, $id)
    {
        $view = 'Organizations/show.twig';
        $organization = Organizations::select("organizations.*", "extra_text.detail_one", "extra_text.detail_two", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url", "details.detail_text",)
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

        $donations = Donations::select("donations.*", "users.id as user_id", "users.fname as fname", "users.lname as lname", "users.profile_img_url as profile_img_url")
                                ->leftJoin('users', 'users.id', '=', 'donations.sender_user_id')
                                ->where('recipient_organization_id', $id)
                                //->where('donations.is_invisible', '1')
                                ->take(5)->orderBy('donations.amount', 'DESC')->get();
                            
        $donations_total = 0;
        for($j = 0; $j < count($donations); $j++) {
            $donations_total += $donations[$j]->amount;
            $donations[$j]->counter = $j;
        }

        return $this->container->get('view')->render($response, $view,  ['organization' => $organization, 'detail_texts' => $detail_texts, 'counter' => $counter, 'donations' => $donations, 'donations_total' => $donations_total]);
    }
}