<?php

/* journal3/template/journal3/headers/mobile/header_mobile_1.twig */
class __TwigTemplate_8be641589b0b6c7ede17fcb94d895bb14f3267f90e43ea72ab50bde57ab54202 extends Twig_Template
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
        echo "<div class=\"mobile-header mobile-default mobile-1\">
  <div class=\"mobile-top-bar\">
    <div class=\"mobile-top-menu-wrapper\">
      ";
        // line 4
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobile_top_menu"), "method");
        echo "
    </div>
    ";
        // line 6
        if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileLangPosition"), "method") == "top")) {
            // line 7
            echo "    <div class=\"language-currency top-menu\">
      <div class=\"mobile-currency-wrapper\">
        ";
            // line 9
            echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ((isset($context["currency"]) ? $context["currency"] : null)) : (""));
            echo "
      </div>
      <div class=\"mobile-language-wrapper\">
        ";
            // line 12
            echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ((isset($context["language"]) ? $context["language"] : null)) : (""));
            echo "
      </div>
    </div>
    ";
        }
        // line 16
        echo "  </div>
  <div class=\"mobile-bar sticky-bar\">
    <div class=\"mobile-logo-wrapper\">
      ";
        // line 19
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) {
            // line 20
            echo "        <div id=\"logo\">
          ";
            // line 21
            if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "logo_src"), "method")) {
                // line 22
                echo "            <a href=\"";
                echo (isset($context["home"]) ? $context["home"] : null);
                echo "\">
              <img src=\"";
                // line 23
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
                // line 26
                echo "            <h1><a href=\"";
                echo (isset($context["home"]) ? $context["home"] : null);
                echo "\">";
                echo (isset($context["name"]) ? $context["name"] : null);
                echo "</a></h1>
          ";
            }
            // line 28
            echo "        </div>
      ";
        }
        // line 30
        echo "    </div>
    <div class=\"mobile-top-menu-wrapper\">
      ";
        // line 32
        echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobile_top_menu"), "method");
        echo "
    </div>
    <div class=\"mobile-bar-group\">
      <div class=\"menu-trigger\"></div>
      ";
        // line 36
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuStatus1"), "method")) {
            // line 37
            echo "      <a class=\"mobile-custom-menu mobile-custom-menu-1\" href=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink1.href"), "method");
            echo "\" ";
            echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "linkAttrs", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink1.attrs"), "method")), "method");
            echo ">
        ";
            // line 38
            echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "countBadge", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink1.name"), "method"), 1 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "cache", array()), "update", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink1.total"), "method")), "method"), 2 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink1.classes"), "method")), "method");
            echo "
      </a>
      ";
        }
        // line 41
        echo "      ";
        if ($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuStatus2"), "method")) {
            // line 42
            echo "      <a class=\"mobile-custom-menu mobile-custom-menu-2\" href=\"";
            echo $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink2.href"), "method");
            echo "\" ";
            echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "linkAttrs", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink2.attrs"), "method")), "method");
            echo ">
        ";
            // line 43
            echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "countBadge", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink2.name"), "method"), 1 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "cache", array()), "update", array(0 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink2.total"), "method")), "method"), 2 => $this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "mobileCustomMenuLink2.classes"), "method")), "method");
            echo "
      </a>
      ";
        }
        // line 46
        echo "      
      <div class=\"mobile-cart-wrapper mini-cart\">
        ";
        // line 48
        echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ((isset($context["cart"]) ? $context["cart"] : null)) : (""));
        echo "
      </div>
    </div>
  </div>
  <div class=\"mobile-search-wrapper full-search\">
    ";
        // line 53
        echo (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "hasClass", array(0 => "mobile-header-active"), "method")) ? ((isset($context["search"]) ? $context["search"] : null)) : (""));
        echo "
  </div>
  
</div>
";
    }

    public function getTemplateName()
    {
        return "journal3/template/journal3/headers/mobile/header_mobile_1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 53,  145 => 48,  141 => 46,  135 => 43,  128 => 42,  125 => 41,  119 => 38,  112 => 37,  110 => 36,  103 => 32,  99 => 30,  95 => 28,  87 => 26,  65 => 23,  60 => 22,  58 => 21,  55 => 20,  53 => 19,  48 => 16,  41 => 12,  35 => 9,  31 => 7,  29 => 6,  24 => 4,  19 => 1,);
    }
}
/* <div class="mobile-header mobile-default mobile-1">*/
/*   <div class="mobile-top-bar">*/
/*     <div class="mobile-top-menu-wrapper">*/
/*       {{ j3.settings.get('mobile_top_menu') }}*/
/*     </div>*/
/*     {% if j3.settings.get('mobileLangPosition') == 'top' %}*/
/*     <div class="language-currency top-menu">*/
/*       <div class="mobile-currency-wrapper">*/
/*         {{ j3.document.hasClass('mobile-header-active') ? currency : '' }}*/
/*       </div>*/
/*       <div class="mobile-language-wrapper">*/
/*         {{ j3.document.hasClass('mobile-header-active') ? language : '' }}*/
/*       </div>*/
/*     </div>*/
/*     {% endif %}*/
/*   </div>*/
/*   <div class="mobile-bar sticky-bar">*/
/*     <div class="mobile-logo-wrapper">*/
/*       {% if j3.document.hasClass('mobile-header-active') %}*/
/*         <div id="logo">*/
/*           {% if j3.settings.get('logo_src') %}*/
/*             <a href="{{ home }}">*/
/*               <img src="{{ j3.settings.get('logo_src') }}" {% if j3.settings.get('logo2x_src') %}srcset="{{ j3.settings.get('logo_src') }} 1x, {{ j3.settings.get('logo2x_src') }} 2x"{% endif %} width="{{ j3.settings.get('logo_width') }}" height="{{ j3.settings.get('logo_height') }}" alt="{{ name }}" title="{{ name }}"/>*/
/*             </a>*/
/*           {% else %}*/
/*             <h1><a href="{{ home }}">{{ name }}</a></h1>*/
/*           {% endif %}*/
/*         </div>*/
/*       {% endif %}*/
/*     </div>*/
/*     <div class="mobile-top-menu-wrapper">*/
/*       {{ j3.settings.get('mobile_top_menu') }}*/
/*     </div>*/
/*     <div class="mobile-bar-group">*/
/*       <div class="menu-trigger"></div>*/
/*       {% if j3.settings.get('mobileCustomMenuStatus1') %}*/
/*       <a class="mobile-custom-menu mobile-custom-menu-1" href="{{ j3.settings.get('mobileCustomMenuLink1.href') }}" {{ j3.linkAttrs(j3.settings.get('mobileCustomMenuLink1.attrs')) }}>*/
/*         {{ j3.countBadge(j3.settings.get('mobileCustomMenuLink1.name'), j3.cache.update(j3.settings.get('mobileCustomMenuLink1.total')), j3.settings.get('mobileCustomMenuLink1.classes')) }}*/
/*       </a>*/
/*       {% endif %}*/
/*       {% if j3.settings.get('mobileCustomMenuStatus2') %}*/
/*       <a class="mobile-custom-menu mobile-custom-menu-2" href="{{ j3.settings.get('mobileCustomMenuLink2.href') }}" {{ j3.linkAttrs(j3.settings.get('mobileCustomMenuLink2.attrs')) }}>*/
/*         {{ j3.countBadge(j3.settings.get('mobileCustomMenuLink2.name'), j3.cache.update(j3.settings.get('mobileCustomMenuLink2.total')), j3.settings.get('mobileCustomMenuLink2.classes')) }}*/
/*       </a>*/
/*       {% endif %}*/
/*       */
/*       <div class="mobile-cart-wrapper mini-cart">*/
/*         {{ j3.document.hasClass('mobile-header-active') ? cart : '' }}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <div class="mobile-search-wrapper full-search">*/
/*     {{ j3.document.hasClass('mobile-header-active') ? search : '' }}*/
/*   </div>*/
/*   */
/* </div>*/
/* */
