<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Middleware;
use App\Controllers;

return function (App $app) {
    /* General Endpoints */
    $app->get('/', [Controllers\HomeController::class, 'index']);
    $app->get('/sessiondump', [Controllers\HomeController::class, 'sessiondump']);
    $app->get('/about', [Controllers\AboutController::class, 'index']);
    $app->get('/contact', [Controllers\ContactController::class, 'index']);
    $app->post('/contact', [Controllers\ContactController::class, 'store']);
    $app->get('/faq', [Controllers\FaqController::class, 'index']);
    $app->get('/donate', [Controllers\DonateController::class, 'index']);

    /* Public User Endpoints */
    $app->group('/user', function (Group $group) {
        $group->get('/login', [Controllers\User\LoginController::class, 'index']);
        $group->post('/login', [Controllers\User\LoginController::class, 'login']);
        $group->get('/register', [Controllers\User\RegisterController::class, 'index']);
        $group->post('/register', [Controllers\User\RegisterController::class, 'store']);
        $group->get('/logout', [Controllers\User\LoginController::class, 'logout']);
    });

    /* API Token for registering admins only */
    $app->group('/user', function (Group $group) {
        $group->get('/register/{api_token}', [Controllers\User\AdminRegisterController::class, 'index']);
        $group->post('/register/{api_token}', [Controllers\User\AdminRegisterController::class, 'store']);
        
        $group->get('/login/{api_token}', [Controllers\User\AdminLoginController::class, 'index']);
        $group->post('/login/{api_token}', [Controllers\User\AdminLoginController::class, 'login']);

    })->add(Middleware\APITokenMiddleware::class);

    /* Public Organization Endpoints */
    $app->group('/organizations', function (Group $group) {
        $group->get('', [Controllers\OrganizationController::class, 'index']);
        $group->get('/{id}', [Controllers\OrganizationController::class, 'show']);
    });

    /* Private User Endpoints */
    $app->group('/user', function (Group $group) {
        $group->get('/profile', [Controllers\User\UserController::class, 'index']);
        $group->get('/profile/edit', [Controllers\User\UserController::class, 'edit']);
        $group->post('/profile', [Controllers\User\UserController::class, 'update']);

    })->add(Middleware\UserAuthMiddleware::class);

    /* Private Organization Endpoints */
    $app->group('/admin', function (Group $group) {
        $group->get('/organizations/{id}', [Controllers\Admin\OrganizationController::class, 'show']);
        $group->get('/organizations/{id}/edit', [Controllers\Admin\OrganizationController::class, 'edit']);
        $group->post('/organizations/{id}', [Controllers\Admin\OrganizationController::class, 'update']);
        
    })->add(Middleware\AdminAuthMiddleware::class);

    /* Private Super User Endpoints */
    $app->group('/superuser', function (Group $group) {
        /* IconTypes */
        $group->get('/icontypes', [Controllers\SuperUser\IconTypesController::class, 'index']);
        $group->get('/icontypes/create', [Controllers\SuperUser\IconTypesController::class, 'create']);
        $group->post('/icontypes', [Controllers\SuperUser\IconTypesController::class, 'store']);
        $group->get('/icontypes/{id}', [Controllers\SuperUser\IconTypesController::class, 'show']);
        $group->get('/icontypes/{id}/edit', [Controllers\SuperUser\IconTypesController::class, 'edit']);
        $group->post('/icontypes/{id}', [Controllers\SuperUser\IconTypesController::class, 'update']);
        //$group->post('/icons/{id}/delete', [Controllers\SuperUser\IconTypesController::class, 'destroy']);

        /* Icons */
        $group->get('/icons', [Controllers\SuperUser\IconController::class, 'index']);
        $group->get('/icons/create', [Controllers\SuperUser\IconController::class, 'create']);
        $group->post('/icons', [Controllers\SuperUser\IconController::class, 'store']);
        $group->get('/icons/{id}', [Controllers\SuperUser\IconController::class, 'show']);
        $group->get('/icons/{id}/edit', [Controllers\SuperUser\IconController::class, 'edit']);
        $group->post('/icons/{id}', [Controllers\SuperUser\IconController::class, 'update']);
        //$group->post('/icons/{id}/delete', [Controllers\SuperUser\IconController::class, 'destroy']);

        /* Templates */
        $group->get('/templates', [Controllers\SuperUser\TemplateController::class, 'index']);
        $group->get('/templates/create', [Controllers\SuperUser\TemplateController::class, 'create']);
        $group->post('/templates', [Controllers\SuperUser\TemplateController::class, 'store']);
        $group->get('/templates/{id}', [Controllers\SuperUser\TemplateController::class, 'show']);
        $group->get('/templates/{id}/edit', [Controllers\SuperUser\TemplateController::class, 'edit']);
        $group->post('/templates/{id}', [Controllers\SuperUser\TemplateController::class, 'update']);
        //$group->post('/templates/{id}/delete', [Controllers\SuperUser\TemplateController::class, 'destroy']);

        /* Users */
        $group->get('/users', [Controllers\SuperUser\UserController::class, 'index']);
        $group->get('/users/create', [Controllers\SuperUser\UserController::class, 'create']);
        $group->post('/users', [Controllers\SuperUser\UserController::class, 'store']);
        $group->get('/users/{id}', [Controllers\SuperUser\UserController::class, 'show']);
        $group->get('/users/{id}/edit', [Controllers\SuperUser\UserController::class, 'edit']);
        $group->post('/users/{id}', [Controllers\Admin\UserController::class, 'update']);
        //$group->post('/users/{id}/delete', [Controllers\SuperUser\UserController::class, 'destroy']);

        /* Tokens */
        $group->get('/organizations/tokens', [Controllers\SuperUser\TokenController::class, 'index']);
        $group->get('/organizations/tokens/create', [Controllers\SuperUser\TokenController::class, 'create']);
        $group->post('/organizations/tokens', [Controllers\SuperUser\TokenController::class, 'store']);
        $group->get('/organizations/tokens/{id}', [Controllers\SuperUser\TokenController::class, 'show']);
        $group->get('/organizations/tokens/{id}/edit', [Controllers\SuperUser\TokenController::class, 'edit']);
        $group->post('/organizations/tokens/{id}', [Controllers\SuperUser\TokenController::class, 'update']);
        //$group->post('/organizations/tokens/{id}/delete', [Controllers\SuperUser\TokenController::class, 'destroy']);

        /* Organizations */
        $group->get('/organizations', [Controllers\SuperUser\OrganizationController::class, 'index']);
        $group->get('/organizations/create', [Controllers\SuperUser\OrganizationController::class, 'create']);
        $group->post('/organizations', [Controllers\SuperUser\OrganizationController::class, 'store']);
        $group->get('/organizations/{id}', [Controllers\SuperUser\OrganizationController::class, 'show']);
        $group->get('/organizations/{id}/edit', [Controllers\SuperUser\OrganizationController::class, 'edit']);
        $group->post('/organizations/{id}', [Controllers\SuperUser\OrganizationController::class, 'update']);
        //$group->post('/organizations/{id}/delete', [Controllers\SuperUser\OrganizationController::class, 'destroy']);

    })->add(Middleware\SuperUserAuthMiddleware::class);
};