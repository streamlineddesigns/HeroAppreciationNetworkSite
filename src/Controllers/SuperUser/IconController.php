<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\SectionIcons;
use App\Models\SectionIconTypes;
use App\Models\SectionIconIconTypes;

class IconController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Icons/index.twig';
        $icons = SectionIcons::select("section_icons.id", "section_icons.name", "section_icons.class_name", "section_icon_types.type")
                               ->leftJoin('section_icon_icon_types', 'section_icon_icon_types.section_icon_id', '=', 'section_icons.id')
                               ->leftJoin('section_icon_types', 'section_icon_icon_types.section_icon_type_id', '=', 'section_icon_types.id')
                               ->orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['icons' => $icons]);
    }

    /*
     * Create View
     */
    public function create($request, $response)
    {
        $view = 'Icons/create.twig';
        $SectionIconTypes = SectionIconTypes::all();
        return $this->container->get('view')->render($response, $view, ['SectionIconTypes' => $SectionIconTypes]);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response)
    {
        $form_data = $request->getParsedBody();

        $SectionIcon = SectionIcons::create([
            "name" => $form_data['name'],
            "class_name" => $form_data['class_name'],
        ]);

        if ($SectionIcon->id != null) {

            $SectionIconIconType = SectionIconIconTypes::create([
                "section_icon_id" => $SectionIcon->id,
                "section_icon_type_id" => $form_data['icon_type']
            ]);

            $this->container->get('flash')->addMessage('success', 'Successfully created icon!');
        } else {
            $this->container->get('flash')->addMessage('error', 'Failed to create icon... Try again?');
        }

        return $response->withStatus(302)->withHeader('Location', '/superuser/icons');
    }
}