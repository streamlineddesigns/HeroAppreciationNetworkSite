<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Templates;
use Slim\Http\UploadedFile;

class TemplateController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Templates/index.twig';
        $templates = Templates::orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['templates' => $templates]);
    }

    /*
     * Create View
     */
    public function create($request, $response)
    {
        $view = 'Templates/create.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response)
    {
        $directory = $this->container->get('settings')['upload_directory']['templates'];
        $uploadedFiles = $request->getUploadedFiles();
        $files = ['img_url' => "", 'hero_section_img_url' => "", 'about_section_img_url' => "", 'details_section_img_url' => "", 'quotes_section_img_url' => "", 'social_media_section_img_url' => "", 'gallery_section_img_url' => ""];
        $keys = array_keys($files);

        for($i = 0; $i < count($keys); $i++) {
            $key = $keys[$i];
            $uploadedFile = $uploadedFiles[$key];
            if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                $filename = $this->moveUploadedFile($directory, $uploadedFile);
                $files[$key] = $filename;
            }
        }

        $form_data = $request->getParsedBody();
        $is_invisible = (isset($form_data['is_invisible'])) ? 0 : 1;//have to flip it because the form input is opposite of boolean

        $Template = Templates::create([
            "name"                          => $form_data['name'],
            "img_url"                       => $files['img_url'],
            "hero_section_img_url"          => $files['hero_section_img_url'],
            "about_section_img_url"         => $files['about_section_img_url'],
            "details_section_img_url"       => $files['details_section_img_url'],
            "quotes_section_img_url"        => $files['quotes_section_img_url'],
            "social_media_section_img_url"  => $files['social_media_section_img_url'],
            "gallery_section_img_url"       => $files['gallery_section_img_url'],
            "is_invisible"                  => $is_invisible,
        ]);

        if ($Template->id != null) {
            $this->container->get('flash')->addMessage('success', 'Successfully created template!');
        } else {
            $this->container->get('flash')->addMessage('error', 'Failed to create template... Try again?');
        }

        return $response->withStatus(302)->withHeader('Location', '/superuser/templates');
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