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

/* Users\profile.twig */
class __TwigTemplate_eae342ec34e0c0de6a014d92b1d38e63d0fe71f48e24aeda8e5322f16d708511 extends Template
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
        $this->parent = $this->loadTemplate("app.twig", "Users\\profile.twig", 1);
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
    background-image: url(\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 10), "html", null, true);
        echo "\");
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
    }

    // line 28
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Profile";
    }

    // line 30
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "
  ";
        // line 32
        if ($this->extensions['App\Twig\CustomTwigExtensions']->hasMessages()) {
            // line 33
            echo "    ";
            if ($this->extensions['App\Twig\CustomTwigExtensions']->successMessage()) {
                // line 34
                echo "        <script>swal(\"Success!\", \"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->successMessage(), "html", null, true);
                echo "\", \"success\");</script>
    ";
            } elseif ($this->extensions['App\Twig\CustomTwigExtensions']->errorMessage()) {
                // line 36
                echo "        <script>swal(\"Error!\", \"";
                echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->errorMessage(), "html", null, true);
                echo "\", \"error\");</script>
    ";
            }
            // line 38
            echo "  ";
        }
        // line 39
        echo "
  <div class=\"container emp-profile my-5 shadow\">
    <form>
      <div class=\"row\">
        <div class=\"col-md-12 mb-5\">
            <a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/edit"), "html", null, true);
        echo "\" class=\"main-btn nav-btn d-sm-inline-block float-right\">Edit</a>
        </div>
        <div class=\"col-lg-12 d-flex justify-content-center align-items-center\">
          <div class=\"profile-img\">

              ";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 49)) {
            // line 50
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 50), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "profile_img_url", [], "any", false, false, false, 50), "html", null, true);
            echo "\" class=\"hidden\" alt=\"profile image\"/>
              ";
        } else {
            // line 52
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/default_profile_img.png"), "html", null, true);
            echo "\" class=\"hidden\" alt=\"default profile image\"/>
              ";
        }
        // line 54
        echo "
          </div>
        </div>
        <div class=\"col-lg-12 my-5\">
          <div class=\"row\">
              
              <div class=\"col-md-12 text-center\">
                  <div class=\"profile-head\">
                      <h5>
                          ";
        // line 63
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 63), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 63), "html", null, true);
        echo "
                      </h5>
                      <h6>
                          
                      </h6>
                      <p class=\"proile-rating mt-0\"><span>Karma Points :</span> ";
        // line 68
        echo twig_escape_filter($this->env, ($context["donations_total"] ?? null), "html", null, true);
        echo "</p>
                  </div>
              </div>
          </div>
          
          <div class=\"row\">
              <div class=\"col-md-12 mt-5 mb-3\">
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
        // line 99
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 99), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 99), "html", null, true);
        echo "</p>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <label>Email</label>
                            </div>
                            <div class=\"col-md-6\">
                                <p class=\"text-center\">";
        // line 107
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 107), "html", null, true);
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
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["donations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["donation"]) {
            // line 140
            echo "                            <div class=\"row row_donations\">
                              <div class=\"col-md-4\">
                                  <a href=\"/organizations/";
            // line 142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "recipient_organization_id", [], "any", false, false, false, 142), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "name", [], "any", false, false, false, 142), "html", null, true);
            echo "</a>
                              </div>
                              <div class=\"col-md-4\">
                                  <p>\$";
            // line 145
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["donation"], "amount", [], "any", false, false, false, 145), "html", null, true);
            echo "</p>
                              </div>
                              <div class=\"col-md-4\">
                                  <label>";
            // line 148
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["donation"], "is_invisible", [], "any", false, false, false, 148), 1))) {
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
        // line 153
        echo "                      </div>

                      <div class=\"tab-pane fade\" id=\"followers\" role=\"tabpanel\" aria-labelledby=\"followers-tab\">
                        <div class=\"row\">
                          ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["followers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
            // line 158
            echo "                              <div class=\"col-lg-4 aligned text-center\">
                                  <div class=\"profile-img one-hundred-box\" style=\"background-image:url(";
            // line 159
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 159), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "profile_img_url", [], "any", false, false, false, 159), "html", null, true);
            echo "\")></div>
                                  <a href=\"";
            // line 160
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/v/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 160), "html", null, true);
            echo "\" class=\"brand-color\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "fname", [], "any", false, false, false, 160), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "lname", [], "any", false, false, false, 160), "html", null, true);
            echo "</a><br>
                              </div>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        echo "                          ";
        if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["followers"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null)) {
            // line 164
            echo "
                          ";
        } else {
            // line 166
            echo "                              0 Followers
                          ";
        }
        // line 168
        echo "                        </div>
                      </div>
                      <div class=\"tab-pane fade\" id=\"following\" role=\"tabpanel\" aria-labelledby=\"following-tab\">
                        <div class=\"row\">
                          ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["following"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["follower"]) {
            // line 173
            echo "                            <div class=\"col-lg-4 aligned text-center\">
                                <div class=\"profile-img one-hundred-box\" style=\"background-image:url(";
            // line 174
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/assets/img/uploads/users/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 174), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "profile_img_url", [], "any", false, false, false, 174), "html", null, true);
            echo "\")></div>
                                <a href=\"";
            // line 175
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\CustomTwigExtensions']->url("/user/profile/v/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "user_id", [], "any", false, false, false, 175), "html", null, true);
            echo "\" class=\"brand-color\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "fname", [], "any", false, false, false, 175), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["follower"], "lname", [], "any", false, false, false, 175), "html", null, true);
            echo "</a><br>
                            </div>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['follower'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 178
        echo "                          ";
        if ((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["following"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[0] ?? null) : null)) {
            // line 179
            echo "
                          ";
        } else {
            // line 181
            echo "                              0 Following
                          ";
        }
        // line 183
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

    // line 196
    public function block_pageScripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 197
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
        // line 229
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
        return "Users\\profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 229,  402 => 197,  398 => 196,  383 => 183,  379 => 181,  375 => 179,  372 => 178,  358 => 175,  351 => 174,  348 => 173,  344 => 172,  338 => 168,  334 => 166,  330 => 164,  327 => 163,  313 => 160,  306 => 159,  303 => 158,  299 => 157,  293 => 153,  278 => 148,  272 => 145,  264 => 142,  260 => 140,  256 => 139,  221 => 107,  208 => 99,  174 => 68,  164 => 63,  153 => 54,  147 => 52,  138 => 50,  136 => 49,  128 => 44,  121 => 39,  118 => 38,  112 => 36,  106 => 34,  103 => 33,  101 => 32,  98 => 31,  94 => 30,  87 => 28,  63 => 10,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Users\\profile.twig", "/home/vagrant/code/nonprofit/src/Views/Users/profile.twig");
    }
}
