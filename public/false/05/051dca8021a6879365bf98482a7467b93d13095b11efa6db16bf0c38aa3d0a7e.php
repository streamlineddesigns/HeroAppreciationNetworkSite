<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* app.twig */
class __TwigTemplate_48d84395299b8a0aad4876e89c0e6c99393f4afb6afcbfdc4cece06d566815dc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'pageStyles' => [$this, 'block_pageStyles'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'pageScripts' => [$this, 'block_pageScripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\" />

        <!--====== Favicon Icon ======-->
        <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/favicon.png"), "html", null, true);
        echo "\" type=\"img/png\" />
        <!--====== Animate CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/animate.min.css"), "html", null, true);
        echo "\">
        <!--====== Bootstrap CSS ======-->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\">
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css\">
        <!--====== Fontawesome CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/font-awesome.min.css"), "html", null, true);
        echo "\" />
        <!--====== Flaticon CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/flaticon.css"), "html", null, true);
        echo "\" />
        <!--====== Slick CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/slick.min.css"), "html", null, true);
        echo "\" />
        <!--====== Lity CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/lity.min.css"), "html", null, true);
        echo "\" />
        <!--====== Main CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/main.css"), "html", null, true);
        echo "\" />
        <!--====== Responsive CSS ======-->
        <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/responsive.css"), "html", null, true);
        echo "\" />
        <!-- Sweet Alerts -->
        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>

        ";
        // line 31
        $this->displayBlock('pageStyles', $context, $blocks);
        // line 32
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>
    
    <body>

        <!--====== Preloader ======-->
        <div id=\"preloader\">
            <div id=\"loading-center\">
                <div id=\"loading-center-absolute\">
                    <div class=\"object\" id=\"object_one\"></div>
                    <div class=\"object\" id=\"object_two\"></div>
                    <div class=\"object\" id=\"object_three\"></div>
                    <div class=\"object\" id=\"object_four\"></div>
                </div>
            </div>
        </div>

        <!--====== Header Start ======-->
        <header class=\"site-header sticky-header transparent-header topbar-transparent\">
            <div class=\"header-topbar d-none d-sm-block\">
                <div class=\"container\">
                    <div class=\"row justify-content-between align-items-center\">
                        <div class=\"col-auto\">
                            <ul class=\"contact-info\">
                                <li><a href=\"mailto:info@charity.com\"><i class=\"far fa-envelope-open\"></i></a></li>
                                <a href=\"tel:6162910591\"><i class=\"far fa-phone\"></i></a>
                            </ul>
                        </div>
                        <div class=\"col-auto d-none d-md-block\">
                            <ul class=\"social-icons\">
                                <li><a class=\"p-2\"><i class=\"fab fa-facebook-square\"></i></a></li>
                                <li><a class=\"p-2\"><i class=\"fab fa-instagram\"></i></a></li>
                                <li><a class=\"p-2\"><i class=\"fab fa-twitter\"></i></a></li>
                                <li><a class=\"p-2\"><i class=\"fab fa-linkedin\"></i></a></li>
                                <li><a class=\"p-2\"><i class=\"fab fa-google\"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"navbar-wrapper\">
                <div class=\"container\">
                    <div class=\"navbar-inner\">
                        <div class=\"site-logo\">
                            <a href=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/logo.png"), "html", null, true);
        echo "\" alt=\"Funden\"></a>
                        </div>
                        <div class=\"nav-menu\">
                            <ul>
                                <!--<li>
                                    <a href=\"#\">Pages</a>
                                    <ul class=\"submenu\">
                                        <li><a href=\"about.html\">About</a></li>
                                        <li><a href=\"company-overview.html\">Company Overview</a></li>
                                        <li><a href=\"team-member.html\">Team Member</a></li>
                                        <li><a href=\"pricing.html\">Pricing</a></li>
                                        <li><a href=\"faq.html\">FAQ</a></li>
                                        <li><a href=\"testimonial.html\">Testimonials</a></li>
                                    </ul>
                                </li>-->
                                <li><a href=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/"), "html", null, true);
        echo "\">Home</a></li>
                                <li><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/organizations"), "html", null, true);
        echo "\">Organizations</a></li>
                                <li><a href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/about"), "html", null, true);
        echo "\">About</a></li>
                                <li><a href=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/contact"), "html", null, true);
        echo "\">Contact</a></li>
                                ";
        // line 95
        if ($this->extensions['App\Twig\CustomTwigExtensions']->hasUserPrivileges()) {
            // line 96
            echo "                                    <li>
                                        <a href=\"#\">Account</a>
                                        <ul class=\"submenu\">
                                            <li><a href=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile"), "html", null, true);
            echo "\">Profile</a></li>
                                            ";
            // line 100
            if ($this->extensions['App\Twig\CustomTwigExtensions']->isAdmin()) {
                // line 101
                echo "                                                <li><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/admin/organizations/"), "html", null, true);
                echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $this->extensions['App\Twig\CustomTwigExtensions']->userSession()) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["org_id"] ?? null) : null), "html", null, true);
                echo "\">Organization</a></li>
                                            ";
            }
            // line 103
            echo "
                                            ";
            // line 104
            if ($this->extensions['App\Twig\CustomTwigExtensions']->hasSuperUserPrivileges()) {
                // line 105
                echo "                                                <li><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/icontypes"), "html", null, true);
                echo "\">Icon Types</a></li>
                                                <li><a href=\"";
                // line 106
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/icons"), "html", null, true);
                echo "\">Icons</a></li>
                                                <!--<li><a href=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/templates"), "html", null, true);
                echo "\">Templates</a></li>-->
                                                <li><a href=\"";
                // line 108
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/organizations/tokens"), "html", null, true);
                echo "\">Tokens</a></li>
                                            ";
            }
            // line 110
            echo "                                            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/logout"), "html", null, true);
            echo "\">Logout</a></li>
                                        </ul>
                                    </li>
                                ";
        } else {
            // line 114
            echo "                                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/login"), "html", null, true);
            echo "\">Login</a></li>
                                ";
        }
        // line 116
        echo "                            </ul>
                        </div>
                        <div class=\"navbar-extra d-flex align-items-center\">
                            <a href=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/organizations"), "html", null, true);
        echo "\" id=\"main_donator\" class=\"main-btn nav-btn d-none d-sm-inline-block\">
                                Donate Now <i class=\"far fa-arrow-right\"></i>
                            </a>
                            <a href=\"#\" class=\"nav-toggler\">
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"mobile-menu-panel\">
                <div class=\"panel-logo\">
                    <a href=\"index.html\"><img src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/logo-white.png"), "html", null, true);
        echo "\" alt=\"Funden\"></a>
                </div>
                <ul class=\"panel-menu\">
                    <li>
                        <a href=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/"), "html", null, true);
        echo "\">Home</a>
                    </li>
                    <li>
                        <a href=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/organizations"), "html", null, true);
        echo "\">Organizations</a>
                    </li>
                    <li>
                        <a href=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/about"), "html", null, true);
        echo "\">About</a>
                    </li>
                    <li>
                        <a href=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/contact"), "html", null, true);
        echo "\">Contact</a>
                    </li>

                    ";
        // line 147
        if ($this->extensions['App\Twig\CustomTwigExtensions']->hasUserPrivileges()) {
            // line 148
            echo "                        <li>
                            <a href=\"#\">Account</a>
                            <ul class=\"submenu\">
                                <li><a href=\"";
            // line 151
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile"), "html", null, true);
            echo "\">Profile</a></li>
                                ";
            // line 152
            if ($this->extensions['App\Twig\CustomTwigExtensions']->isAdmin()) {
                // line 153
                echo "                                    <li><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/admin/organizations/"), "html", null, true);
                echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $this->extensions['App\Twig\CustomTwigExtensions']->userSession()) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["org_id"] ?? null) : null), "html", null, true);
                echo "\">Organization</a></li>
                                ";
            }
            // line 155
            echo "
                                ";
            // line 156
            if ($this->extensions['App\Twig\CustomTwigExtensions']->hasSuperUserPrivileges()) {
                // line 157
                echo "                                    <li><a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/icontypes"), "html", null, true);
                echo "\">Icon Types</a></li>
                                    <li><a href=\"";
                // line 158
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/icons"), "html", null, true);
                echo "\">Icons</a></li>
                                    <!--<li><a href=\"";
                // line 159
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/templates"), "html", null, true);
                echo "\">Templates</a></li>-->
                                    <li><a href=\"";
                // line 160
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/superuser/organizations/tokens"), "html", null, true);
                echo "\">Tokens</a></li>
                                ";
            }
            // line 162
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/logout"), "html", null, true);
            echo "\">Logout</a></li>
                            </ul>
                        </li>
                    ";
        } else {
            // line 166
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/login"), "html", null, true);
            echo "\">Login</a></li>
                    ";
        }
        // line 168
        echo "                </ul>
                <div class=\"panel-extra\">
                    <a href=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/organizations"), "html", null, true);
        echo "\" class=\"main-btn btn-white\">
                        Donate Now <i class=\"far fa-arrow-right\"></i>
                    </a>
                </div>
                <a href=\"#\" class=\"panel-close\">
                    <i class=\"fal fa-times\"></i>
                </a>
            </div>
        </header>






        <!--====== Content Start ======-->
        <div id=\"content\">
            ";
        // line 187
        $this->displayBlock('content', $context, $blocks);
        // line 188
        echo "        </div>
        <!--====== Content End ======-->







        <!--====== Footer Start ======-->
        <footer class=\"site-footer\">
            <div class=\"footer-content-area\">
                <div class=\"container\">
                    <div class=\"footer-widgets\">
                        <div class=\"row justify-content-between\">
                            <div class=\"col-xl-3 col-lg-4 col-md-6\">
                                <div class=\"widget about-widget\">
                                    <div class=\"footer-logo\">
                                        <img src=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/logo-white.png"), "html", null, true);
        echo "\" alt=\"Funden\">
                                    </div>
                                    <p>
                                        Help your favorite organizations get to the highest ranks!
                                    </p>
                                    <div class=\"newsletter-form\">
                                        <h5 class=\"form-title\">Join Newsletters</h5>
                                        <form action=\"#\">
                                            <input type=\"text\" placeholder=\"Email Address\">
                                            <button type=\"submit\"><i class=\"far fa-arrow-right\"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                                <div class=\"col-lg-2 col-md-5 col-sm-6\">
                                <div class=\"widget nav-widget\">
                                    <h4 class=\"widget-title\">Links</h4>
                                    <ul>
                                        <li><a href=\"";
        // line 224
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/"), "html", null, true);
        echo "\">Home</a></li>
                                        <li><a href=\"";
        // line 225
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/organizations "), "html", null, true);
        echo "\">Organizations</a></li>
                                        <li><a href=\"";
        // line 226
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/about"), "html", null, true);
        echo "\">About</a></li>
                                        <li><a href=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/contact"), "html", null, true);
        echo "\">Contact</a></li>
                                        ";
        // line 228
        if ($this->extensions['App\Twig\CustomTwigExtensions']->hasUserPrivileges()) {
            // line 229
            echo "                                            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile"), "html", null, true);
            echo "\">Profile</a></li>
                                            <li><a href=\"";
            // line 230
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/logout"), "html", null, true);
            echo "\">Logout</a></li>
                                        ";
        } else {
            // line 232
            echo "                                            <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/login"), "html", null, true);
            echo "\">Login</a></li>
                                        ";
        }
        // line 234
        echo "                                    </ul>
                                </div>
                            </div>
                            <div class=\"col-lg-2 col-md-6 col-sm-6\">
                                <div class=\"widget nav-widget\">
                                    <h4 class=\"widget-title\">Support</h4>
                                    <ul>
                                        <li><a >Privacy Policy</a></li>
                                        <li><a >Conditions</a></li>
                                        <li><a >Company</a></li>
                                        <li><a >Faq & Terms</a></li>
                                        <li><a >Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=\"col-lg-auto col-md-5 col-sm-8\">
                                <div class=\"widget contact-widget\">
                                    <h4 class=\"widget-title\">Contact Us</h4>
                                    <ul class=\"info-list\">
                                        <li>
                                            <span class=\"icon\"><i class=\"far fa-phone\"></i></span>
                                            <span class=\"info\">
                                                <span class=\"info-title\">Phone Number</span>
                                                <a href=\"tel:6162910591\">(616) 291-0591</a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class=\"icon\"><i class=\"far fa-envelope-open\"></i></span>
                                            <span class=\"info\">
                                                <span class=\"info-title\">Email Address</span>
                                                <a href=\"mailto:info@charity.com\">info@charity.com</a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class=\"icon\"><i class=\"fas fa-users\"></i></span>
                                            <span class=\"info\">
                                                <span class=\"info-title\">Social Media</span>
                                                <div class=\"\">
                                                    <a class=\"p-2\"><i class=\"fab fa-facebook-square\"></i></a>
                                                    <a class=\"p-2\"><i class=\"fab fa-instagram\"></i></a>
                                                    <a class=\"p-2\"><i class=\"fab fa-twitter\"></i></a>
                                                    <a class=\"p-2\"><i class=\"fab fa-linkedin\"></i></a>
                                                    <a class=\"p-2\"><i class=\"fab fa-google\"></i></a>
                                                </div>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"copyright-area\">
                        <div class=\"row flex-md-row-reverse\">
                            <div class=\"col-md-6\">
                                <p class=\"copyright-text\">© 2021 <a href=\"#\">Charity</a>. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== Footer End ======-->

        <!--====== jquery js ======-->
        <script src=\"https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js\"></script>
        <!--====== Bootstrap js ======-->
        <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js\" integrity=\"sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p\" crossorigin=\"anonymous\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js\" integrity=\"sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF\" crossorigin=\"anonymous\"></script>
        <script src=\"https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js\"></script>
        <!--====== Inview js ======-->
        <script src=\"";
        // line 304
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/jquery.inview.min.js"), "html", null, true);
        echo "\"></script>
        <!--====== Slick js ======-->
        <script src=\"";
        // line 306
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/slick.min.js"), "html", null, true);
        echo "\"></script>
        <!--====== Lity js ======-->
        <script src=\"";
        // line 308
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/lity.min.js"), "html", null, true);
        echo "\"></script>
        <!--====== Wow js ======-->
        <script src=\"";
        // line 310
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/wow.min.js"), "html", null, true);
        echo "\"></script>
        <!--====== Main js ======-->
        <script src=\"";
        // line 312
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/main.js"), "html", null, true);
        echo "\"></script>

        ";
        // line 314
        $this->displayBlock('pageScripts', $context, $blocks);
        // line 315
        echo "    </body>
</html>";
    }

    // line 31
    public function block_pageStyles($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 32
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 187
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 314
    public function block_pageScripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "app.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  571 => 314,  565 => 187,  559 => 32,  553 => 31,  548 => 315,  546 => 314,  541 => 312,  536 => 310,  531 => 308,  526 => 306,  521 => 304,  449 => 234,  443 => 232,  438 => 230,  433 => 229,  431 => 228,  427 => 227,  423 => 226,  419 => 225,  415 => 224,  394 => 206,  374 => 188,  372 => 187,  352 => 170,  348 => 168,  342 => 166,  334 => 162,  329 => 160,  325 => 159,  321 => 158,  316 => 157,  314 => 156,  311 => 155,  304 => 153,  302 => 152,  298 => 151,  293 => 148,  291 => 147,  285 => 144,  279 => 141,  273 => 138,  267 => 135,  260 => 131,  245 => 119,  240 => 116,  234 => 114,  226 => 110,  221 => 108,  217 => 107,  213 => 106,  208 => 105,  206 => 104,  203 => 103,  196 => 101,  194 => 100,  190 => 99,  185 => 96,  183 => 95,  179 => 94,  175 => 93,  171 => 92,  167 => 91,  147 => 76,  99 => 32,  97 => 31,  90 => 27,  85 => 25,  80 => 23,  75 => 21,  70 => 19,  65 => 17,  56 => 11,  51 => 9,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "app.twig", "/home/vagrant/code/nonprofit/src/Views/app.twig");
    }
}
