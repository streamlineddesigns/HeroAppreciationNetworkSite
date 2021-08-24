<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\SectionIcons;
use App\Models\SectionIconTypes;
use App\Models\SectionIconIconTypes;

class IconTypesController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'IconTypes/index.twig';
        $icontypes = SectionIconTypes::orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['icontypes' => $icontypes]);
    }

    /*
     * Create View
     */
    public function create($request, $response)
    {
        $view = 'IconTypes/create.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response)
    {
        $form_data = $request->getParsedBody();

        $SectionIconType = SectionIconTypes::create([
            "type" => $form_data['type'],
        ]);

        if ($SectionIconType->id != null) {

            $this->container->get('flash')->addMessage('success', 'Successfully created icon!');
        } else {
            $this->container->get('flash')->addMessage('error', 'Failed to create icon... Try again?');
        }

        return $response->withStatus(302)->withHeader('Location', '/superuser/icontypes');
    }
}