<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Organizations;
use App\Models\Donations;
use Illuminate\Database\Capsule\Manager as DB;

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
                                           ->where('organizations.is_invisible', 0)->get();

        $donations = Donations::select("donations.*")->get();
                            
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
        $topThree = collect($organizations)->take(3);
        $organizations = array_reverse($organizations);
        array_pop($organizations);
        array_pop($organizations);
        array_pop($organizations);
        $organizations = array_reverse($organizations);

        return $this->container->get('view')->render($response, $view, ['organizations' => $organizations,'topThree' => $topThree]);// 'top' => $top]);
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
                                ->orderBy('donations.amount', 'DESC')->get();
                            
        $donations_total = 0;
        for($j = 0; $j < count($donations); $j++) {
            $donations_total += (isset($donations[$j]->amount)) ? $donations[$j]->amount : 0;
            $donations[$j]->counter = $j;
        }

        $donation_statistics = array();

        $average_donation = (count($donations) > 0) ? number_format($donations_total / count($donations), 2) : 0;
        $donation_statistics['average_donation'] = $average_donation;

        $highest_donation = $donations->first();
        $donation_statistics['highest_donation'] = $highest_donation;

        $donations_count = count($donations);
        $donation_statistics['donations_count'] = $donations_count;

        $backers = array();
        for($k = 0; $k < count($donations); $k++) {
            if (! in_array($donations[$k]->sender_user_id, $backers)) {
                array_push($backers, $donations[$k]->sender_user_id);
            }
            
        }
        $donation_statistics['backers'] = count($backers);
        $rank = 0;
        $ranks = DB::table('donations')->select(DB::raw('recipient_organization_id, sum(amount) as sum, organizations.id'))->leftJoin('organizations', 'organizations.id', '=', 'donations.recipient_organization_id')->groupBy('recipient_organization_id')->orderBy('sum', 'desc')->get();
        //$response->getBody()->write(json_encode($ranks));
        //return $response;
        for($l = 0; $l < count($ranks); $l++) {
            if ($ranks[$l]->recipient_organization_id == $id) {
                $rank = $l + 1;
            }
        }
        $donation_statistics['rank'] = $rank;

        $donation_statistics['total'] = $donations_total;

        $donations = collect($donations)->where('is_invisible', 0)->take(5);
        
        //$donations = $donations->take(5);

        return $this->container->get('view')->render($response, $view,  ['organization' => $organization, 'detail_texts' => $detail_texts, 'counter' => $counter, 'donations' => $donations, 'donations_total' => $donations_total, 'donation_statistics' => $donation_statistics,]);
    }


    public function search($request, $response, $name) 
    {
        $organization = Organizations::select("organizations.*")
                                       ->where("is_invisible", 0)
                                       ->where("organizations.name",'LIKE','%'.$name.'%')
                                       ->orderBy("organizations.name")
                                       ->limit(5)->get();

                                       

        if (isset($organization[0]->id)) {
            $response->getBody()->write(json_encode($organization));
        }
        
        return $response;
    }
}