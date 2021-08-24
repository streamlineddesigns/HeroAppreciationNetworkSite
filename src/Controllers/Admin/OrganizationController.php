<?php

namespace App\Controllers\Admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;

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
            $organization = Organizations::select("organizations.*", "org_template_hero_section.cta_text", "org_template_about_section.about_us_text")
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_details_section', 'org_template_details_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->where('organizations.id', $id)->get();

            //$response->getBody()->write(json_encode($organization));
            //return $response;

            return $this->container->get('view')->render($response, $view, ['organization' => $organization]);
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
            /* 
             * NEED details joined to!!
             * migrations need to be run again for details table
             *
             */
            $organization = Organizations::select("organizations.*", "extra_text.*", "org_template_hero_section.cta_text", "org_template_hero_section.hero_img_url", "org_template_hero_section.featured_img_url", "org_template_about_section.about_us_text", "org_template_about_section.about_img_url")
                                           ->leftJoin('extra_text', 'extra_text.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_about_section', 'org_template_about_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_details_section', 'org_template_details_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_gallery_section', 'org_template_gallery_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_hero_section', 'org_template_hero_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_quote_section', 'org_template_quote_section.organization_id', '=', 'organizations.id')
                                           ->leftJoin('org_template_social_media_section', 'org_template_social_media_section.organization_id', '=', 'organizations.id')
                                           ->where('organizations.id', $id)->get();
            return $this->container->get('view')->render($response, $view, ['organization' => $organization]);
        } else {
            $this->container->get('flash')->addMessage('error', 'Could not find organization... Try again?');
            return $response->withStatus(302)->withHeader('Location', "/user/profile");
        }
    }

    /*
     * Update Endpoint
     */
    public function update($request, $response)
    {
        $org_id = $_SESSION['user']['org_id'];
        return $response->withStatus(302)->withHeader('Location', "/Admin/Organizations/$org_id");
    }
}