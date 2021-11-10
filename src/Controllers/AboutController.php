<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Models\Organizations;
use App\Models\Donations;

class AboutController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'about.twig';
        $organizations = Organizations::select("organizations.*", "extra_text.detail_one", "extra_text.detail_two", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url")
                                           ->leftJoin('extra_text', 'extra_text.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->where('organizations.is_invisible', 0)->get();

        $donations = Donations::select("donations.*", "users.id as user_id", "users.fname as fname", "users.lname as lname", "users.profile_img_url as profile_img_url", "organizations.name as org_name", "organizations.id as org_id")
                                ->leftJoin('users', 'users.id', '=', 'donations.sender_user_id')
                                ->leftJoin('organizations', 'organizations.id', '=', 'donations.recipient_organization_id')
                                ->orderBy('donations.amount', 'DESC')->get();
                            
        $organizations_donations_total = array();

        for($j = 0; $j < count($donations); $j++) {
            if (isset($organizations_donations_total[$donations[$j]->recipient_organization_id])) {
                $organizations_donations_total[$donations[$j]->recipient_organization_id] = $organizations_donations_total[$donations[$j]->recipient_organization_id] + $donations[$j]->amount;
            } else {
                $organizations_donations_total[$donations[$j]->recipient_organization_id] = (isset($donations[$j]->amount)) ? $donations[$j]->amount : 0;
            }
        }

        for($k = 0; $k < count($organizations); $k++) {
            $organizations[$k]->donations_total = (isset($organizations_donations_total[$organizations[$k]->id])) ? $organizations_donations_total[$organizations[$k]->id] : 0;
        }

        //Seperate top 3 and all else
        $organizations = array_reverse($organizations->sortBy('donations_total')->toArray());
        $top_count = 3;
        $topThree = collect($organizations)->take($top_count);
        $all_organizations = $organizations;
        $organizations = array_reverse($organizations);
        for($i = 0; $i < $top_count; $i++) {
            array_pop($organizations);
        }
        $organizations = array_reverse($organizations);

        $donation_statistics = array();

        $donations_total = 0;
        for($j = 0; $j < count($donations); $j++) {
            $donations_total += (isset($donations[$j]->amount)) ? $donations[$j]->amount : 0;
           //$donations[$j]->counter = $j;
        }
        $average_donation = (count($donations) > 0) ? $donations_total / count($donations) : 0;
        $donation_statistics['average_donation'] = $average_donation;

        $donation_statistics['total_donations'] = $donations_total;

        $donation_statistics['donations_count'] = count($donations);

        $donation_statistics['total_organizations'] = count($all_organizations);


        $true_donations = array_reverse($donations->sortBy('amount')->toArray());
        $top_donation_count = 10;
        $top_donations = collect($donations)->take($top_donation_count);
        $donations = $top_donations;

        return $this->container->get('view')->render($response, $view, ['organizations' => $organizations, 'donations' => $donations, 'all_organizations' => $all_organizations, 'topThree' => $topThree, 'donation_statistics' => $donation_statistics]);// 'top' => $top]);

    }
}