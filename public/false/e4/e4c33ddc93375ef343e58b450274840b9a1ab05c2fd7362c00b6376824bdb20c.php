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

/* Users\show.twig */
class __TwigTemplate_bf48bad67d78cb06f0daa8e17a4d224e115d2fb8c2f155285903647f0943310d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pageStyles' => [$this, 'block_pageStyles'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'pageScripts' => [$this, 'block_pageScripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "app.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("app.twig", "Users\\show.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pageStyles($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/css/profile.css"), "html", null, true);
        echo "\">
<style>
.profile-img {
    height: 250px;
    width: 250px;
    border-radius: 50%;
    background-size: contain;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #222222;
}

.emp-profile {
    width: 550px;
    border-radius: 75px;
}
.custom-group-text {
    border: 9px solid #02a95c;
}
</style>


";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 27)) {
            // line 28
            echo "    <style>
    .profile-img {
        background-image: url(\"";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 30), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 30), "html", null, true);
            echo "\");
    }
    </style>
";
        } else {
            // line 34
            echo "    <style>
    .profile-img {
        background-image: url(\"";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/default_profile_img.png"), "html", null, true);
            echo "\");
    }
    </style>
";
        }
        // line 40
        echo "
";
    }

    // line 43
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        if (($context["user"] ?? null)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 43), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 43), "html", null, true);
            echo " ";
        } else {
            echo " User Profile ";
        }
        echo " ";
    }

    // line 45
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "
  ";
        // line 47
        if ($this->extensions['App\Twig\CustomTwigExtensions']->hasMessages()) {
            // line 48
            echo "    ";
            if ($this->extensions['App\Twig\CustomTwigExtensions']->successMessage()) {
                // line 49
                echo "        <script>swal(\"Success!\", \"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->successMessage(), "html", null, true);
                echo "\", \"success\");</script>
    ";
            } elseif ($this->extensions['App\Twig\CustomTwigExtensions']->errorMessage()) {
                // line 51
                echo "        <script>swal(\"Error!\", \"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->errorMessage(), "html", null, true);
                echo "\", \"error\");</script>
    ";
            }
            // line 53
            echo "  ";
        }
        // line 54
        echo "

  <div class=\"container emp-profile my-5 shadow\">
  <a href=\"javascript:FunApp.backButtonClick()\" class=\"btn btn-success mb-5 btn-chubby\"><i class=\"bi bi-chevron-left\"></i> Back</a>
    <form method=\"post\" action=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/follow/"), "html", null, true);
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 58), "html", null, true);
        echo "\">
      <div class=\"row\">
        <div class=\"col-lg-12 d-flex justify-content-center align-items-center\">
          <div class=\"profile-img\">

              ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 63)) {
            // line 64
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 64), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 64), "html", null, true);
            echo "\" class=\"hidden\" alt=\"profile image\"/>
              ";
        } else {
            // line 66
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/default_profile_img.png"), "html", null, true);
            echo "\" class=\"hidden\" alt=\"default profile image\"/>
              ";
        }
        // line 68
        echo "
          </div>
        </div>
        <div class=\"col-lg-12 my-5\">
          <div class=\"row\">
              
              <div class=\"col-md-12 text-center\">
                  <div class=\"profile-head\">
                      <h5>
                          ";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 77), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 77), "html", null, true);
        echo "
                      </h5>
                      <h6>
                          
                      </h6>
                      <p class=\"proile-rating mt-0\"><span>Karma Points :</span> ";
        // line 82
        echo twig_escape_filter($this->env, ($context["donations_total"] ?? null), "html", null, true);
        echo "</p>
                  </div>
              </div>
              ";
        // line 85
        if (($context["is_me"] ?? null)) {
            // line 86
            echo "
              ";
        } else {
            // line 88
            echo "
              <div class=\"col-md-6 mt-3\">

                    ";
            // line 91
            if (($context["followed_by_me"] ?? null)) {
                // line 92
                echo "                    <button class=\"btn main-btn px-3 float-right btn-purple-outline\" type=\"submit\">
                    <i class=\"fas fa-leaf\"></i>
                        Following
                    </button>
                    ";
            } else {
                // line 97
                echo "                    <button class=\"btn main-btn px-3 float-right\" type=\"submit\">
                    <i class=\"fas fa-plus\"></i>
                        Follow
                    </button>
                    ";
            }
            // line 102
            echo "                
              </div>
              <div class=\"col-md-6 mt-3\">
                <a class=\"btn main-btn px-3 float-left\" style=\"background-color:#8606A1;\" href=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/message/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 105), "html", null, true);
            echo "\" type=\"submit\">
                <i class=\"fas fa-comment\"></i>
                    Message
                </a>
              </div>

              ";
        }
        // line 112
        echo "          </div>
          
          <div class=\"row\">
              <div class=\"col-md-12 mt-5 mb-3 text-center\">
                <ul class=\"nav nav-tabs justify-content-center\" id=\"myTab\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                      <a class=\"nav-link active\" id=\"profile-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#profile\" type=\"button\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"true\">Profile</a>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                      <a class=\"nav-link\" id=\"donations-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#donations\" type=\"button\" role=\"tab\" aria-controls=\"donations\" aria-selected=\"false\">Donations</a>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                      <a class=\"nav-link\" id=\"followers-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#followers\" type=\"button\" role=\"tab\" aria-controls=\"followers\" aria-selected=\"false\">Followers</a>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                      <a class=\"nav-link\" id=\"following-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#following\" type=\"button\" role=\"tab\" aria-controls=\"following\" aria-selected=\"false\">Following</a>
                    </li>
                </ul>
              </div>
              <div class=\"col-md-12\">
                  <div class=\"tab-content profile-tab\" id=\"myTabContent\">

                      <div class=\"tab-pane fade show active\" id=\"profile\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <label>Name</label>
                            </div>
                            <div class=\"col-md-6\">
                                <p class=\"text-center\">";
        // line 140
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 140), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 140), "html", null, true);
        echo "</p>
                            </div>
                        </div>
                        <!--<div class=\"row\">
                            <div class=\"col-md-6\">
                                <label>Email</label>
                            </div>
                            <div class=\"col-md-6\">
                                <p class=\"text-center\">";
        // line 148
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 148), "html", null, true);
        echo "</p>
                            </div>
                        </div>-->
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <label>Karma Points</label>
                            </div>
                            <div class=\"col-md-6\">
                                <p class=\"text-center\">";
        // line 156
        echo twig_escape_filter($this->env, ($context["donations_total"] ?? null), "html", null, true);
        echo "</p>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <label>Social Media</label>
                            </div>
                            <div class=\"col-md-6\">
                                <p class=\"text-center social-medias brand-color\">
                                  <i class=\"fab fa-2x fa-facebook\"></i>
                                  <i class=\"fab fa-2x fa-instagram\"></i>
                                  <i class=\"fab fa-2x fa-twitter\"></i>
                                  <i class=\"fab fa-2x fa-linkedin\"></i>
                                  <i class=\"fab fa-2x fa-google\"></i>
                                </p>
                            </div>
                        </div>
                      </div>
                      <div class=\"tab-pane fade\" id=\"donations\" role=\"tabpanel\" aria-labelledby=\"donations-tab\">
                        <div class=\"row\">
                              <div class=\"col-md-4\">
                                  <label>To</label>
                              </div>
                              <div class=\"col-md-4\">
                                  <label>Amount</label>
                              </div>
                              <div class=\"col-md-4\">
                                  <label>Public</label>
                              </div>
                              
                          </div>

                          ";
        // line 188
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["donations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["donation"]) {
            // line 189
            echo "                            <div class=\"row row_donations\">
                              <div class=\"col-md-4\">
                                  <a href=\"/organizations/";
            // line 191
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "recipient_organization_id", [], "any", false, false, false, 191), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "name", [], "any", false, false, false, 191), "html", null, true);
            echo "</a>
                              </div>
                              <div class=\"col-md-4\">
                                  <p>\$";
            // line 194
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "amount", [], "any", false, false, false, 194), "html", null, true);
            echo "</p>
                              </div>
                              <div class=\"col-md-4\">
                                  <label>";
            // line 197
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["donation"], "is_invisible", [], "any", false, false, false, 197), 1))) {
                echo " <i class=\"fas fa-eye brand-color\"></i> ";
            } else {
                echo " <i class=\"fas fa-eye-slash\"></i> ";
            }
            echo "</label>
                              </div>
                            </div>
                            <hr>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['donation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 202
        echo "                      </div>

                      <div class=\"tab-pane fade\" id=\"followers\" role=\"tabpanel\" aria-labelledby=\"followers-tab\">
                        
                        <div class=\"row\">
                            ";
        // line 207
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["followers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
            // line 208
            echo "                                <div class=\"col-lg-4 aligned text-center\">
                                    <div class=\"profile-img one-hundred-box\" style=\"background-image:url(";
            // line 209
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 209), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "profile_img_url", [], "any", false, false, false, 209), "html", null, true);
            echo "\")></div>
                                    <a href=\"";
            // line 210
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/v/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 210), "html", null, true);
            echo "\" class=\"brand-color\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "fname", [], "any", false, false, false, 210), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "lname", [], "any", false, false, false, 210), "html", null, true);
            echo "</a><br>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "                            ";
        if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["followers"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null)) {
            // line 214
            echo "
                            ";
        } else {
            // line 216
            echo "                                0 Followers
                            ";
        }
        // line 218
        echo "                        </div>
                      </div>

                      <div class=\"tab-pane fade\" id=\"following\" role=\"tabpanel\" aria-labelledby=\"following-tab\">
                        <div class=\"row\">
                            ";
        // line 223
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["following"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
            // line 224
            echo "                                <div class=\"col-lg-4 aligned text-center\">
                                    <div class=\"profile-img one-hundred-box\" style=\"background-image:url(";
            // line 225
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 225), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "profile_img_url", [], "any", false, false, false, 225), "html", null, true);
            echo "\")></div>
                                    <a href=\"";
            // line 226
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/v/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 226), "html", null, true);
            echo "\" class=\"brand-color\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "fname", [], "any", false, false, false, 226), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "lname", [], "any", false, false, false, 226), "html", null, true);
            echo "</a><br>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 229
        echo "                            ";
        if ((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["following"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[0] ?? null) : null)) {
            // line 230
            echo "
                            ";
        } else {
            // line 232
            echo "                                0 Following
                            ";
        }
        // line 234
        echo "                        </div>
                      </div>

                  </div>
              </div>
          </div>
        </div>

    </form>           
  </div>

";
    }

    // line 247
    public function block_pageScripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 248
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/js/FunApp.js"), "html", null, true);
        echo "\"></script>
    <script>

        \$(document).ready(function() {
            var dropdownHTML = 
            `
            <ul class=\"dropdown-menu dropdown-toggleable shadow\">
                    
            </ul>
            `;
            var html =
            `
            <input class=\"form-control search-input\" id=\"user_search\" type=\"search\" placeholder=\"Search\" autocomplete=\"off\">
            `;

            \$(\"#main_donator\").replaceWith(html + dropdownHTML);

            var link = \"/user/search/\";

            \$(\"#user_search\").keyup(function(){
                let test = link +\$(\"#user_search\").val();
                \$.ajax({
                type: \"POST\",
                url: test,
                data:'keyword='+\$(this).val(),
                beforeSend: function(){
                    \$(\"#search-box\").css(\"background\",\"#FFF url(LoaderIcon.gif) no-repeat 165px\");
                },
                success: function(data){
                    var users = JSON.parse(data);
                    \$(\".dropdown-toggleable\").html(\"\");
                    for(var i = 0; i < users.length; i++) {
                        var href = \"";
        // line 280
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/v/"), "html", null, true);
        echo "\" + users[i].id;
                        var newishhtml = \"<a class='p-2 d-block text-center' href=\"+href+\">\"+ users[i].fname + \" \" +users[i].lname + \"</a>\";
                        \$(\".dropdown-toggleable\").append(newishhtml);
                    }
                }
                });
            });

            \$(\"#user_search\").click(function() {
                \$(\".dropdown-toggleable\").show();
                if (\$(\".site-header\").hasClass(\"sticky-on\")) {
                    \$(\".dropdown-toggleable\").addClass(\"dropdown-toggleable-sticky-on\");
                } else {
                    \$(\".dropdown-toggleable\").removeClass(\"dropdown-toggleable-sticky-on\");
                }
            });

            \$(\"#user_search\").blur(function() {
                
                setTimeout((function() {
                    \$(\".dropdown-toggleable\").hide();
                }), 500)
            });
        });
    
    </script>
";
    }

    public function getTemplateName()
    {
        return "Users\\show.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  530 => 280,  494 => 248,  490 => 247,  475 => 234,  471 => 232,  467 => 230,  464 => 229,  450 => 226,  443 => 225,  440 => 224,  436 => 223,  429 => 218,  425 => 216,  421 => 214,  418 => 213,  404 => 210,  397 => 209,  394 => 208,  390 => 207,  383 => 202,  368 => 197,  362 => 194,  354 => 191,  350 => 189,  346 => 188,  311 => 156,  300 => 148,  287 => 140,  257 => 112,  246 => 105,  241 => 102,  234 => 97,  227 => 92,  225 => 91,  220 => 88,  216 => 86,  214 => 85,  208 => 82,  198 => 77,  187 => 68,  181 => 66,  172 => 64,  170 => 63,  161 => 58,  155 => 54,  152 => 53,  146 => 51,  140 => 49,  137 => 48,  135 => 47,  132 => 46,  128 => 45,  112 => 43,  107 => 40,  100 => 36,  96 => 34,  86 => 30,  82 => 28,  80 => 27,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Users\\show.twig", "/home/vagrant/code/nonprofit/src/Views/Users/show.twig");
    }
}
