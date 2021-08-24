<?php
declare(strict_types=1);

use DI\Container;
use App\Authentication\Authentication;

return function (Container $container) {
    $container->set('auth', function ($container) {
        return new Authentication();
    });
};