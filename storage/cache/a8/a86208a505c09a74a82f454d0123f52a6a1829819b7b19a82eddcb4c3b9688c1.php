<?php

/* journal3/template/journal3/headers/desktop/classic.twig */
class __TwigTemplate_2e2f13ef1c2a797e2d7618ee29ba04da99269562f0883ac33b19fcd3e39ab6e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"header header-classic header-lg\">
  <div class=\"top-bar navbar-nav\">
    ";
        // line 3
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu"), "method");
        echo "
    ";
        // line 4
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "langPosition"), "method") == "top")) {
            // line 5
            echo "      <div class=\"language-currency top-menu\">
        <div class=\"desktop-language-wrapper\">
          ";
            // line 7
            echo (isset($context["language"]) ? $context["language"] : null);
            echo "
        </div>
        <div class=\"desktop-currency-wrapper\">
          ";
            // line 10
            echo (isset($context["currency"]) ? $context["currency"] : null);
            echo "
        </div>
      </div>
    ";
        }
        // line 14
        echo "    <div class=\"third-menu\">";
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_3"), "method");
        echo "</div>
    ";
        // line 15
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "secondaryMenuPosition"), "method") == "top")) {
            // line 16
            echo "      <div class=\"top-menu secondary-menu\">";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_2"), "method");
            echo "</div>
    ";
        }
        // line 18
        echo "  </div>
  
  <div class=\"mid-bar navbar-nav\">
    <div class=\"row\">
      <div class=\"col col-lg-2\">  
        <div class=\"logo-wrapper\">
        <div id=\"logo\">
          ";
        // line 25
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_src"), "method")) {
            // line 26
            echo "            <a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">
              <img src=\"";
            // line 27
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_src"), "method");
            echo "\" ";
            if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo2x_src"), "method")) {
                echo "srcset=\"";
                echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_src"), "method");
                echo " 1x, ";
                echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo2x_src"), "method");
                echo " 2x\"";
            }
            echo " width=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_width"), "method");
            echo "\" height=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_height"), "method");
            echo "\" alt=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" title=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\"/>
            </a>
          ";
        } else {
            // line 30
            echo "            <h1><a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "</a></h1>
          ";
        }
        // line 32
        echo "        </div>
      </div>
    </div>
      <div class=\"col col-lg-6\"><div class=\"ekaksha-menu menu-";
        // line 35
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMenuLayout"), "method");
        echo " ";
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method")) {
            echo "has-menu-2";
        }
        echo " navbar-nav\">
        ";
        // line 36
        echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ("") : ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu"), "method")));
        echo "
        ";
        // line 37
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMainMenu2Position"), "method") == "menu")) {
            // line 38
            echo "        ";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method");
            echo "
        ";
        }
        // line 40
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "cartPosition"), "method") == "menu")) {
            // line 41
            echo "          <div class=\"desktop-cart-wrapper default-cart-wrapper\">
            ";
            // line 42
            echo (isset($context["cart"]) ? $context["cart"] : null);
            echo "
          </div>
        ";
        }
        // line 45
        echo "      </div></div>
  
      <div class=\"col col-lg-3\">
        <div class=\"desktop-search-wrapper full-search default-search-wrapper\">
          ";
        // line 49
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "
        </div>
      </div>

      <div class=\"col col-lg-1\">
        <ul class=\"top-right-nav\">
          
          <li class=\"nav-item\">
            <div class=\"mytaccount-section\">
              
          ";
        // line 59
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu"), "method");
        echo "
          ";
        // line 60
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "langPosition"), "method") == "top")) {
            // line 61
            echo "            <div class=\"language-currency top-menu\">
              <div class=\"desktop-language-wrapper\">
                ";
            // line 63
            echo (isset($context["language"]) ? $context["language"] : null);
            echo "
              </div>
              <div class=\"desktop-currency-wrapper\">
                ";
            // line 66
            echo (isset($context["currency"]) ? $context["currency"] : null);
            echo "
              </div>
            </div>
          ";
        }
        // line 70
        echo "          <div class=\"third-menu\">";
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_3"), "method");
        echo "</div>
          ";
        // line 71
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "secondaryMenuPosition"), "method") == "top")) {
            // line 72
            echo "            <div class=\"top-menu secondary-menu\">";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_2"), "method");
            echo "</div>
          ";
        }
        // line 74
        echo "            </div>

            <!-- <a href=\"";
        // line 76
        echo (isset($context["account"]) ? $context["account"] : null);
        echo "\" title=\"";
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo " \" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-user icon-user\"></i>
            </a>
            <ul class=\"dropdown-menu \">
           
              ";
        // line 81
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            // line 82
            echo "              <li><a href=\"";
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\">";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 83
            echo (isset($context["order"]) ? $context["order"] : null);
            echo "\">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 84
            echo (isset($context["transaction"]) ? $context["transaction"] : null);
            echo "\">";
            echo (isset($context["text_transaction"]) ? $context["text_transaction"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 85
            echo (isset($context["download"]) ? $context["download"] : null);
            echo "\">";
            echo (isset($context["text_download"]) ? $context["text_download"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 86
            echo (isset($context["logout"]) ? $context["logout"] : null);
            echo "\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> ";
            echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
            echo "</a></li>
              ";
        } else {
            // line 88
            echo "
              <li><a href=\"";
            // line 89
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\">";
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 90
            echo (isset($context["login"]) ? $context["login"] : null);
            echo "\">";
            echo (isset($context["text_login"]) ? $context["text_login"] : null);
            echo "</a></li>
              ";
        }
        // line 91
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
            </ul> -->
          </li>

          
      
        </ul>
        
      </div>
    </div>
  
    
    ";
        // line 103
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMainMenu2Position"), "method") == "top")) {
            // line 104
            echo "      ";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method");
            echo "
    ";
        }
        // line 106
        echo "    
  </div>
  
</div>
";
    }

    public function getTemplateName()
    {
        return "journal3/template/journal3/headers/desktop/classic.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 106,  277 => 104,  275 => 103,  261 => 91,  254 => 90,  248 => 89,  245 => 88,  238 => 86,  232 => 85,  226 => 84,  220 => 83,  213 => 82,  211 => 81,  201 => 76,  197 => 74,  191 => 72,  189 => 71,  184 => 70,  177 => 66,  171 => 63,  167 => 61,  165 => 60,  161 => 59,  148 => 49,  142 => 45,  136 => 42,  133 => 41,  130 => 40,  124 => 38,  122 => 37,  118 => 36,  110 => 35,  105 => 32,  97 => 30,  75 => 27,  70 => 26,  68 => 25,  59 => 18,  53 => 16,  51 => 15,  46 => 14,  39 => 10,  33 => 7,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="header header-classic header-lg">*/
/*   <div class="top-bar navbar-nav">*/
/*     {{ j3.settings.get('desktop_top_menu') }}*/
/*     {% if j3.settings.get('langPosition') == 'top' %}*/
/*       <div class="language-currency top-menu">*/
/*         <div class="desktop-language-wrapper">*/
/*           {{ language }}*/
/*         </div>*/
/*         <div class="desktop-currency-wrapper">*/
/*           {{ currency }}*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/*     <div class="third-menu">{{ j3.settings.get('desktop_top_menu_3') }}</div>*/
/*     {% if j3.settings.get('secondaryMenuPosition') == 'top' %}*/
/*       <div class="top-menu secondary-menu">{{ j3.settings.get('desktop_top_menu_2') }}</div>*/
/*     {% endif %}*/
/*   </div>*/
/*   */
/*   <div class="mid-bar navbar-nav">*/
/*     <div class="row">*/
/*       <div class="col col-lg-2">  */
/*         <div class="logo-wrapper">*/
/*         <div id="logo">*/
/*           {% if j3.settings.get('logo_src') %}*/
/*             <a href="{{ home }}">*/
/*               <img src="{{ j3.settings.get('logo_src') }}" {% if j3.settings.get('logo2x_src') %}srcset="{{ j3.settings.get('logo_src') }} 1x, {{ j3.settings.get('logo2x_src') }} 2x"{% endif %} width="{{ j3.settings.get('logo_width') }}" height="{{ j3.settings.get('logo_height') }}" alt="{{ name }}" title="{{ name }}"/>*/
/*             </a>*/
/*           {% else %}*/
/*             <h1><a href="{{ home }}">{{ name }}</a></h1>*/
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*       <div class="col col-lg-6"><div class="ekaksha-menu menu-{{ j3.settings.get('headerMenuLayout') }} {% if j3.settings.get('desktop_main_menu_2') %}has-menu-2{% endif %} navbar-nav">*/
/*         {{ j3.document.hasClass('mobile-header-active') ? '' : j3.settings.get('desktop_main_menu') }}*/
/*         {% if j3.settings.get('headerMainMenu2Position') == 'menu' %}*/
/*         {{ j3.settings.get('desktop_main_menu_2') }}*/
/*         {% endif %}*/
/*         {% if j3.settings.get('cartPosition') == 'menu' %}*/
/*           <div class="desktop-cart-wrapper default-cart-wrapper">*/
/*             {{ cart }}*/
/*           </div>*/
/*         {% endif %}*/
/*       </div></div>*/
/*   */
/*       <div class="col col-lg-3">*/
/*         <div class="desktop-search-wrapper full-search default-search-wrapper">*/
/*           {{ search }}*/
/*         </div>*/
/*       </div>*/
/* */
/*       <div class="col col-lg-1">*/
/*         <ul class="top-right-nav">*/
/*           */
/*           <li class="nav-item">*/
/*             <div class="mytaccount-section">*/
/*               */
/*           {{ j3.settings.get('desktop_top_menu') }}*/
/*           {% if j3.settings.get('langPosition') == 'top' %}*/
/*             <div class="language-currency top-menu">*/
/*               <div class="desktop-language-wrapper">*/
/*                 {{ language }}*/
/*               </div>*/
/*               <div class="desktop-currency-wrapper">*/
/*                 {{ currency }}*/
/*               </div>*/
/*             </div>*/
/*           {% endif %}*/
/*           <div class="third-menu">{{ j3.settings.get('desktop_top_menu_3') }}</div>*/
/*           {% if j3.settings.get('secondaryMenuPosition') == 'top' %}*/
/*             <div class="top-menu secondary-menu">{{ j3.settings.get('desktop_top_menu_2') }}</div>*/
/*           {% endif %}*/
/*             </div>*/
/* */
/*             <!-- <a href="{{ account }}" title="{{ text_account }} " class="dropdown-toggle" data-toggle="dropdown">*/
/*               <i class="fa fa-user icon-user"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu ">*/
/*            */
/*               {% if logged %}*/
/*               <li><a href="{{ account }}">{{ text_account }}</a></li>*/
/*               <li><a href="{{ order }}">{{ text_order }}</a></li>*/
/*               <li><a href="{{ transaction }}">{{ text_transaction }}</a></li>*/
/*               <li><a href="{{ download }}">{{ text_download }}</a></li>*/
/*               <li><a href="{{ logout }}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ text_logout }}</a></li>*/
/*               {% else %}*/
/* */
/*               <li><a href="{{ register }}">{{ text_register }}</a></li>*/
/*               <li><a href="{{ login }}">{{ text_login }}</a></li>*/
/*               {% endif %}															*/
/*             </ul> -->*/
/*           </li>*/
/* */
/*           */
/*       */
/*         </ul>*/
/*         */
/*       </div>*/
/*     </div>*/
/*   */
/*     */
/*     {% if j3.settings.get('headerMainMenu2Position') == 'top' %}*/
/*       {{ j3.settings.get('desktop_main_menu_2') }}*/
/*     {% endif %}*/
/*     */
/*   </div>*/
/*   */
/* </div>*/
/* */
