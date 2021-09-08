<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use DI\Container;
use Twig\TwigFunction;

class CustomTwigExtensions extends AbstractExtension
{
    public $container;
    public $messages;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->messages = $this->container->get('flash')->getMessages();
    }
    
    public function getFunctions()
    {
        return [
            new TwigFunction('url', [$this, 'url']),
            new TwigFunction('hasMessages', [$this, 'hasMessages']),
            new TwigFunction('successMessage', [$this, 'successMessage']),
            new TwigFunction('errorMessage', [$this, 'errorMessage']),
            new TwigFunction('inArray', [$this, 'inArray']),
            new TwigFunction('isLoggedIn', [$this, 'isLoggedIn']),
            new TwigFunction('userSession', [$this, 'userSession']),
            new TwigFunction('hasUserPrivileges', [$this, 'hasUserPrivileges']),
            new TwigFunction('hasAdminPrivileges', [$this, 'hasAdminPrivileges']),
            new TwigFunction('isAdmin', [$this, 'isAdmin']),
            new TwigFunction('hasSuperUserPrivileges', [$this, 'hasSuperUserPrivileges']),
            new TwigFunction('count', [$this, 'count']),
            new TwigFunction('getEmptyArray', [$this, 'getEmptyArray']),
            new TwigFunction('shorten', [$this, 'shorten']),
        ];
    }

    public function url($asset_url)
    {
        $url = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $asset_url;
        $url = strtok($url, "?");
        return $url;
    }

    public function hasMessages()
    {
        if (isset($this->messages)) {
            return true;
        } else {
            return false;
        }
    }

    public function successMessage()
    {
        if (isset($this->messages["success"])) {
            return $this->messages["success"][0];
        } else {
            return false;
        }
    }

    public function errorMessage()
    {
        if (isset($this->messages["error"])) {
            return $this->messages["error"][0];
        } else {
            return false;
        }
    }

    public function inArray($needle, $haystack)
    {
        if (in_array($needle, $haystack)) {
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn()
    {
        return $this->container->get('auth')->hasUserPrivileges();
    }

    public function hasUserPrivileges()
    {
        return $this->container->get('auth')->hasUserPrivileges();
    }

    public function hasAdminPrivileges()
    {
        return $this->container->get('auth')->hasAdminPrivileges();
    }

    public function hasSuperUserPrivileges()
    {
        return $this->container->get('auth')->hasSuperUserPrivileges();
    }

    public function isAdmin()
    {
        if ($this->container->get('auth')->hasAdminPrivileges() && ! $this->container->get('auth')->hasSuperUserPrivileges()) {
            return  true;
        }
        return false;
    }

    public function userSession()
    {
        return $_SESSION['user'];
    }

    public function count($arr)
    {
        return count($arr);
    }

    public function getEmptyArray($current, $max)
    {
        $arr = array();
        $target = $max - $current;
        if ($current < $max) {
            for ($i = 0; $i < $target; $i++) {
                array_push($arr, $current + 1 + $i);
            }
        } else {
            return [];
        }

        return $arr;
    }

    public function shorten($str)
    {
        if (empty($str)) {
            return "";
        }
        $length = 150;
        $shortened = "";
        for($i = 0; $i < $length; $i++) {
            $shortened .= (isset($str[$i])) ? $str[$i] : "" ;
        }
        $shortened .= "...";
        return $shortened;
    }
}