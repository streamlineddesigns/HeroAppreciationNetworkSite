<?php

namespace App\Controllers\Donations;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;
use App\Models\Donations;

class DonationController extends Controller
{
    /*
     * Returns page used to make actual donations
     */
    public function create($request, $response, $id)
    {
        $form_data = $request->getParsedBody();
        $donation_options = (isset($form_data['donation_options'])) ? $form_data['donation_options'] : array();
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
        $view = 'Donations/create.twig';
        return $this->container->get('view')->render($response, $view, ['donation_options' => $donation_options, 'organization' => $organization]);
    }

    public function pay($request, $response, $id)
    {
        $form_data = $request->getParsedBody();

        $sender_user_id = (isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : false;
        $recipient_organization_id = $id;
        $amount = $form_data['donation_amount'];
        $is_invisible = (isset($form_data['is_invisible'])) ? 1 : 0;

        if ($sender_user_id) {
            
            $Donation = Donations::create([
                "sender_user_id" => $sender_user_id,
                "recipient_organization_id" => $recipient_organization_id,
                "amount" => $amount,
                "is_invisible" => $is_invisible,
            ]);

            if ($Donation->id != null) {
                $this->container->get('flash')->addMessage('success', 'Donation Successful! Thank you!');
            }

        } else {
            $this->container->get('flash')->addMessage('error', 'Please log in to continue!');
            return $response->withStatus(302)->withHeader('Location', "/user/login");
        }

        return $response->withStatus(302)->withHeader('Location', "/organizations/$id");
    }
}