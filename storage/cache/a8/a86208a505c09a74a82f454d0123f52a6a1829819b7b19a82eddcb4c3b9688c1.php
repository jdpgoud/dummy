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
        // line 24
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_src"), "method")) {
            // line 25
            echo "            <a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">
              <img src=\"";
            // line 26
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
            // line 29
            echo "            <h1><a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "</a></h1>
          ";
        }
        // line 31
        echo "        </div>
      </div>
    </div>
      <div class=\"col col-lg-8\"><div class=\"ekaksha-menu menu-";
        // line 34
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMenuLayout"), "method");
        echo " ";
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method")) {
            echo "has-menu-2";
        }
        echo " navbar-nav\">
        ";
        // line 35
        echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ("") : ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu"), "method")));
        echo "
        ";
        // line 36
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMainMenu2Position"), "method") == "menu")) {
            // line 37
            echo "        ";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method");
            echo "
        ";
        }
        // line 39
        echo "        ";
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "cartPosition"), "method") == "menu")) {
            // line 40
            echo "          <div class=\"desktop-cart-wrapper default-cart-wrapper\">
            ";
            // line 41
            echo (isset($context["cart"]) ? $context["cart"] : null);
            echo "
          </div>
        ";
        }
        // line 44
        echo "      </div></div>
  
      <div class=\"col col-lg-2\">
        <ul class=\"top-right-nav\">
          
          <li class=\"nav-item\">
            <div class=\"mytaccount-section\">
              
          ";
        // line 52
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu"), "method");
        echo "
          ";
        // line 53
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "langPosition"), "method") == "top")) {
            // line 54
            echo "            <div class=\"language-currency top-menu\">
              <div class=\"desktop-language-wrapper\">
                ";
            // line 56
            echo (isset($context["language"]) ? $context["language"] : null);
            echo "
              </div>
              <div class=\"desktop-currency-wrapper\">
                ";
            // line 59
            echo (isset($context["currency"]) ? $context["currency"] : null);
            echo "
              </div>
            </div>
          ";
        }
        // line 63
        echo "          <div class=\"third-menu\">";
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_3"), "method");
        echo "</div>
          ";
        // line 64
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "secondaryMenuPosition"), "method") == "top")) {
            // line 65
            echo "            <div class=\"top-menu secondary-menu\">";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_top_menu_2"), "method");
            echo "</div>
          ";
        }
        // line 67
        echo "            </div>

            <!-- <a href=\"";
        // line 69
        echo (isset($context["account"]) ? $context["account"] : null);
        echo "\" title=\"";
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo " \" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-user icon-user\"></i>
            </a>
            <ul class=\"dropdown-menu \">
           
              ";
        // line 74
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            // line 75
            echo "              <li><a href=\"";
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\">";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 76
            echo (isset($context["order"]) ? $context["order"] : null);
            echo "\">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 77
            echo (isset($context["transaction"]) ? $context["transaction"] : null);
            echo "\">";
            echo (isset($context["text_transaction"]) ? $context["text_transaction"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 78
            echo (isset($context["download"]) ? $context["download"] : null);
            echo "\">";
            echo (isset($context["text_download"]) ? $context["text_download"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 79
            echo (isset($context["logout"]) ? $context["logout"] : null);
            echo "\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> ";
            echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
            echo "</a></li>
              ";
        } else {
            // line 81
            echo "
              <li><a href=\"";
            // line 82
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\">";
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo "</a></li>
              <li><a href=\"";
            // line 83
            echo (isset($context["login"]) ? $context["login"] : null);
            echo "\">";
            echo (isset($context["text_login"]) ? $context["text_login"] : null);
            echo "</a></li>
              ";
        }
        // line 84
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
            </ul> -->
          </li>

          
      
        </ul>
        
      </div>
    </div>
  
    
    ";
        // line 96
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "headerMainMenu2Position"), "method") == "top")) {
            // line 97
            echo "      ";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "desktop_main_menu_2"), "method");
            echo "
    ";
        }
        // line 99
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
        return array (  273 => 99,  267 => 97,  265 => 96,  251 => 84,  244 => 83,  238 => 82,  235 => 81,  228 => 79,  222 => 78,  216 => 77,  210 => 76,  203 => 75,  201 => 74,  191 => 69,  187 => 67,  181 => 65,  179 => 64,  174 => 63,  167 => 59,  161 => 56,  157 => 54,  155 => 53,  151 => 52,  141 => 44,  135 => 41,  132 => 40,  129 => 39,  123 => 37,  121 => 36,  117 => 35,  109 => 34,  104 => 31,  96 => 29,  74 => 26,  69 => 25,  67 => 24,  59 => 18,  53 => 16,  51 => 15,  46 => 14,  39 => 10,  33 => 7,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
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
/*       <div class="col col-lg-8"><div class="ekaksha-menu menu-{{ j3.settings.get('headerMenuLayout') }} {% if j3.settings.get('desktop_main_menu_2') %}has-menu-2{% endif %} navbar-nav">*/
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
/*       <div class="col col-lg-2">*/
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
