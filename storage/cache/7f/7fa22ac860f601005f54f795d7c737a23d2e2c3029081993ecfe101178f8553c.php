<?php

/* journal3/template/journal3/module/blocks.twig */
class __TwigTemplate_c9da39c3fc43580db6c7743fe52733b62e9922b30ff4e3ab30cb28d89e2468f2 extends Twig_Template
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
        // line 37
        $context["self"] = $this;
        // line 38
        echo "<div class=\"";
        echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method");
        echo "\">
  ";
        // line 39
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 40
            echo "    <h3 class=\"title module-title\">";
            echo (isset($context["title"]) ? $context["title"] : null);
            echo "</h3>
  ";
        }
        // line 42
        echo "  <div class=\"module-body\">
  ";
        // line 44
        echo "  ";
        if ((((isset($context["display"]) ? $context["display"] : null) == "grid") &&  !(isset($context["carousel"]) ? $context["carousel"] : null))) {
            // line 45
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 46
                echo "      <div class=\"";
                echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "classes", array())), "method");
                echo "\">
        ";
                // line 47
                echo $context["self"]->getrenderBlocksItem($context["item"], $context);
                echo "
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "  ";
        }
        // line 51
        echo "  ";
        // line 52
        echo "  ";
        if ((((isset($context["display"]) ? $context["display"] : null) == "grid") && (isset($context["carousel"]) ? $context["carousel"] : null))) {
            // line 53
            echo "    <div class=\"swiper\" data-items-per-row='";
            echo twig_jsonencode_filter((isset($context["itemsPerRow"]) ? $context["itemsPerRow"] : null), twig_constant("JSON_FORCE_OBJECT"));
            echo "' data-options='";
            echo twig_jsonencode_filter((isset($context["carouselOptions"]) ? $context["carouselOptions"] : null), twig_constant("JSON_FORCE_OBJECT"));
            echo "'>
      <div class=\"swiper-container\" ";
            // line 54
            if ($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "isRTL", array(), "method")) {
                echo "dir=\"rtl\"";
            }
            echo ">
        <div class=\"swiper-wrapper\">
          ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 57
                echo "            <div class=\"";
                echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "classes", array())), "method");
                echo "\">
              ";
                // line 58
                echo $context["self"]->getrenderBlocksItem($context["item"], $context);
                echo "
            </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "        </div>
      </div>
      <div class=\"swiper-buttons\">
        <div class=\"swiper-button-prev\"></div>
        <div class=\"swiper-button-next\"></div>
      </div>
      <div class=\"swiper-pagination\"></div>
    </div>
  ";
        }
        // line 70
        echo "  ";
        // line 71
        echo "  ";
        if (((isset($context["display"]) ? $context["display"] : null) == "tabs")) {
            // line 72
            echo "    <div class=\"tabs-container\">
      <ul class=\"nav nav-tabs\">
        ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 75
                echo "          <li class=\"";
                echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "tab_classes", array())), "method");
                echo "\">
            ";
                // line 76
                if ($this->getAttribute($this->getAttribute($context["item"], "link", array()), "href", array())) {
                    // line 77
                    echo "              <a href=\"";
                    echo $this->getAttribute($this->getAttribute($context["item"], "link", array()), "href", array());
                    echo "\" ";
                    echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "linkAttrs", array(0 => $this->getAttribute($context["item"], "link", array())), "method");
                    echo ">";
                    echo $this->getAttribute($context["item"], "title", array());
                    echo "</a>
            ";
                } else {
                    // line 79
                    echo "              <a href=\"#";
                    echo (isset($context["id"]) ? $context["id"] : null);
                    echo "-tab-";
                    echo $this->getAttribute($context["loop"], "index", array());
                    echo "\" data-toggle=\"tab\">";
                    echo $this->getAttribute($context["item"], "title", array());
                    echo "</a>
            ";
                }
                // line 81
                echo "          </li>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "      </ul>
      <div class=\"tab-content\">
        ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 86
                echo "          ";
                if ( !$this->getAttribute($this->getAttribute($context["item"], "link", array()), "href", array())) {
                    // line 87
                    echo "            <div class=\"";
                    echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "classes", array())), "method");
                    echo "\" id=\"";
                    echo (isset($context["id"]) ? $context["id"] : null);
                    echo "-tab-";
                    echo $this->getAttribute($context["loop"], "index", array());
                    echo "\">
              ";
                    // line 88
                    echo $context["self"]->getrenderBlocksItem($context["item"], $context);
                    echo "
            </div>
          ";
                }
                // line 91
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "      </div>
    </div>
  ";
        }
        // line 95
        echo "  ";
        // line 96
        echo "  ";
        if (((isset($context["display"]) ? $context["display"] : null) == "accordion")) {
            // line 97
            echo "    <div class=\"panel-group\" id=\"";
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "-collapse\">
      ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 99
                echo "        <div class=\"";
                echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "classes", array())), "method");
                echo "\">
          <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
              <a href=\"#";
                // line 102
                echo (isset($context["id"]) ? $context["id"] : null);
                echo "-collapse-";
                echo $this->getAttribute($context["loop"], "index", array());
                echo "\" class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#";
                echo (isset($context["id"]) ? $context["id"] : null);
                echo "-collapse\" aria-expanded=\"false\">
                ";
                // line 103
                echo $this->getAttribute($context["item"], "title", array());
                echo "
                <i class=\"fa fa-caret-down\"></i>
              </a>
            </h4>
          </div>
          <div class=\"";
                // line 108
                echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "classes", array(0 => $this->getAttribute($context["item"], "panel_classes", array())), "method");
                echo "\" id=\"";
                echo (isset($context["id"]) ? $context["id"] : null);
                echo "-collapse-";
                echo $this->getAttribute($context["loop"], "index", array());
                echo "\">
            <div class=\"panel-body\">
              ";
                // line 110
                echo $context["self"]->getrenderBlocksItem($context["item"], $context);
                echo "
            </div>
          </div>
        </div>
      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo "    </div>
  ";
        }
        // line 117
        echo "  </div>
</div>
";
    }

    // line 1
    public function getrenderBlocksItem($__item__ = null, $__context__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "context" => $__context__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "  ";
            $context["self"] = $this;
            // line 3
            echo "  <div class=\"block-body expand-block\">
    ";
            // line 4
            if ((($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "display", array()) == "grid") && $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array()))) {
                // line 5
                echo "      <h3 class=\"title module-title block-title\">";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array());
                echo "</h3>
    ";
            }
            // line 7
            echo "    ";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "header", array()) == "image")) {
                // line 8
                echo "      ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "j3", array()), "settings", array()), "get", array(0 => "performanceLazyLoadImagesStatus"), "method") && $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "lazyLoad", array()))) {
                    // line 9
                    echo "     
        <div class=\"block-header\"><img src=\"";
                    // line 10
                    echo $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "dummy_image", array());
                    echo "\" data-src=\"";
                    echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array());
                    echo "\" ";
                    if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image2x", array())) {
                        echo "data-srcset=\"";
                        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array());
                        echo " 1x, ";
                        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image2x", array());
                        echo " 2x\" ";
                    }
                    echo " alt=\"";
                    echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "alt", array());
                    echo "\" width=\"";
                    echo $this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "imageDimensions", array()), "width", array());
                    echo "\" height=\"";
                    echo $this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "imageDimensions", array()), "height", array());
                    echo "\" class=\"block-image lazyload\"/></div>
      ";
                } else {
                    // line 12
                    echo "        <div class=\"block-header\"><img src=\"";
                    echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array());
                    echo "\" ";
                    if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image2x", array())) {
                        echo "srcset=\"";
                        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image", array());
                        echo " 1x, ";
                        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "image2x", array());
                        echo " 2x\" ";
                    }
                    echo " alt=\"";
                    echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "alt", array());
                    echo "\" width=\"";
                    echo $this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "imageDimensions", array()), "width", array());
                    echo "\" height=\"";
                    echo $this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "imageDimensions", array()), "height", array());
                    echo "\" class=\"block-image\"/></div>
      ";
                }
                // line 14
                echo "    ";
            } elseif (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "header", array()) == "icon")) {
                // line 15
                echo "      <div class=\"block-header\"><i class=\"icon icon-block\"></i></div>
    ";
            } elseif (($this->getAttribute(            // line 16
(isset($context["item"]) ? $context["item"] : null), "header", array()) == "text")) {
                // line 17
                echo "      <div class=\"block-header\"><span class=\"block-header-text\">";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "text", array());
                echo "</span></div>
    ";
            }
            // line 19
            echo "    <div class=\"block-wrapper\">
      <div class=\"block-content ";
            // line 20
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "expandButton", array())) {
                echo "expand-content";
            }
            echo " block-";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "contentType", array());
            echo "\">
        ";
            // line 21
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "contentType", array()) == "map")) {
                // line 22
                echo "        <div class=\"journal-loading\"><i class=\"fa fa-spinner fa-spin\"></i></div>
        ";
            }
            // line 24
            echo "        ";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "content", array());
            echo "
        ";
            // line 25
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "expandButton", array())) {
                // line 26
                echo "          <div class=\"block-expand-overlay\"><a class=\"block-expand btn\"></a></div>
        ";
            }
            // line 28
            echo "      </div>
      ";
            // line 29
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "footer", array()) == "text")) {
                // line 30
                echo "        <div class=\"block-footer\">";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "footerText", array());
                echo "</div>
      ";
            } elseif (($this->getAttribute(            // line 31
(isset($context["item"]) ? $context["item"] : null), "footer", array()) == "button")) {
                // line 32
                echo "        <div class=\"block-footer\"><a class=\"btn\" href=\"";
                echo $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "footerButtonLink", array()), "href", array());
                echo "\" ";
                echo $this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "j3", array()), "linkAttrs", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "footerButtonLink", array())), "method");
                echo ">";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "footerButton", array());
                echo "</a></div>
      ";
            }
            // line 34
            echo "    </div>
  </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "journal3/template/journal3/module/blocks.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  465 => 34,  455 => 32,  453 => 31,  448 => 30,  446 => 29,  443 => 28,  439 => 26,  437 => 25,  432 => 24,  428 => 22,  426 => 21,  418 => 20,  415 => 19,  409 => 17,  407 => 16,  404 => 15,  401 => 14,  381 => 12,  360 => 10,  357 => 9,  354 => 8,  351 => 7,  345 => 5,  343 => 4,  340 => 3,  337 => 2,  324 => 1,  318 => 117,  314 => 115,  295 => 110,  286 => 108,  278 => 103,  270 => 102,  263 => 99,  246 => 98,  241 => 97,  238 => 96,  236 => 95,  231 => 92,  217 => 91,  211 => 88,  202 => 87,  199 => 86,  182 => 85,  178 => 83,  163 => 81,  153 => 79,  143 => 77,  141 => 76,  136 => 75,  119 => 74,  115 => 72,  112 => 71,  110 => 70,  99 => 61,  90 => 58,  85 => 57,  81 => 56,  74 => 54,  67 => 53,  64 => 52,  62 => 51,  59 => 50,  50 => 47,  45 => 46,  40 => 45,  37 => 44,  34 => 42,  28 => 40,  26 => 39,  21 => 38,  19 => 37,);
    }
}
/* {% macro renderBlocksItem(item, context) %}*/
/*   {% import _self as self %}*/
/*   <div class="block-body expand-block">*/
/*     {% if context.display == 'grid' and item.title %}*/
/*       <h3 class="title module-title block-title">{{ item.title }}</h3>*/
/*     {% endif %}*/
/*     {% if item.header == 'image' %}*/
/*       {% if context.j3.settings.get('performanceLazyLoadImagesStatus') and context.lazyLoad %}*/
/*      */
/*         <div class="block-header"><img src="{{ context.dummy_image }}" data-src="{{ item.image }}" {% if item.image2x %}data-srcset="{{ item.image }} 1x, {{ item.image2x }} 2x" {% endif %} alt="{{ item.alt }}" width="{{ context.imageDimensions.width }}" height="{{ context.imageDimensions.height }}" class="block-image lazyload"/></div>*/
/*       {% else %}*/
/*         <div class="block-header"><img src="{{ item.image }}" {% if item.image2x %}srcset="{{ item.image }} 1x, {{ item.image2x }} 2x" {% endif %} alt="{{ item.alt }}" width="{{ context.imageDimensions.width }}" height="{{ context.imageDimensions.height }}" class="block-image"/></div>*/
/*       {% endif %}*/
/*     {% elseif item.header == 'icon' %}*/
/*       <div class="block-header"><i class="icon icon-block"></i></div>*/
/*     {% elseif item.header == 'text' %}*/
/*       <div class="block-header"><span class="block-header-text">{{ item.text }}</span></div>*/
/*     {% endif %}*/
/*     <div class="block-wrapper">*/
/*       <div class="block-content {% if item.expandButton %}expand-content{% endif %} block-{{ item.contentType }}">*/
/*         {% if item.contentType == 'map' %}*/
/*         <div class="journal-loading"><i class="fa fa-spinner fa-spin"></i></div>*/
/*         {% endif %}*/
/*         {{ item.content }}*/
/*         {% if item.expandButton %}*/
/*           <div class="block-expand-overlay"><a class="block-expand btn"></a></div>*/
/*         {% endif %}*/
/*       </div>*/
/*       {% if item.footer == 'text' %}*/
/*         <div class="block-footer">{{ item.footerText }}</div>*/
/*       {% elseif item.footer == 'button' %}*/
/*         <div class="block-footer"><a class="btn" href="{{ item.footerButtonLink.href }}" {{ context.j3.linkAttrs(item.footerButtonLink) }}>{{ item.footerButton }}</a></div>*/
/*       {% endif %}*/
/*     </div>*/
/*   </div>*/
/* {% endmacro %}*/
/* {% import _self as self %}*/
/* <div class="{{ j3.classes(classes) }}">*/
/*   {% if title %}*/
/*     <h3 class="title module-title">{{ title }}</h3>*/
/*   {% endif %}*/
/*   <div class="module-body">*/
/*   {# grid #}*/
/*   {% if display == 'grid' and not carousel %}*/
/*     {% for item in items %}*/
/*       <div class="{{ j3.classes(item.classes) }}">*/
/*         {{ self.renderBlocksItem(item, _context) }}*/
/*       </div>*/
/*     {% endfor %}*/
/*   {% endif %}*/
/*   {# grid + carousel #}*/
/*   {% if display == 'grid' and carousel %}*/
/*     <div class="swiper" data-items-per-row='{{ itemsPerRow|json_encode(constant('JSON_FORCE_OBJECT')) }}' data-options='{{ carouselOptions|json_encode(constant('JSON_FORCE_OBJECT')) }}'>*/
/*       <div class="swiper-container" {% if j3.isRTL() %}dir="rtl"{% endif %}>*/
/*         <div class="swiper-wrapper">*/
/*           {% for item in items %}*/
/*             <div class="{{ j3.classes(item.classes) }}">*/
/*               {{ self.renderBlocksItem(item, _context) }}*/
/*             </div>*/
/*           {% endfor %}*/
/*         </div>*/
/*       </div>*/
/*       <div class="swiper-buttons">*/
/*         <div class="swiper-button-prev"></div>*/
/*         <div class="swiper-button-next"></div>*/
/*       </div>*/
/*       <div class="swiper-pagination"></div>*/
/*     </div>*/
/*   {% endif %}*/
/*   {# tabs #}*/
/*   {% if display == 'tabs' %}*/
/*     <div class="tabs-container">*/
/*       <ul class="nav nav-tabs">*/
/*         {% for item in items %}*/
/*           <li class="{{ j3.classes(item.tab_classes) }}">*/
/*             {% if item.link.href %}*/
/*               <a href="{{ item.link.href }}" {{ j3.linkAttrs(item.link) }}>{{ item.title }}</a>*/
/*             {% else %}*/
/*               <a href="#{{ id }}-tab-{{ loop.index }}" data-toggle="tab">{{ item.title }}</a>*/
/*             {% endif %}*/
/*           </li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*       <div class="tab-content">*/
/*         {% for item in items %}*/
/*           {% if not item.link.href %}*/
/*             <div class="{{ j3.classes(item.classes) }}" id="{{ id }}-tab-{{ loop.index }}">*/
/*               {{ self.renderBlocksItem(item, _context) }}*/
/*             </div>*/
/*           {% endif %}*/
/*         {% endfor %}*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/*   {# accordion #}*/
/*   {% if display == 'accordion' %}*/
/*     <div class="panel-group" id="{{ id }}-collapse">*/
/*       {% for item in items %}*/
/*         <div class="{{ j3.classes(item.classes) }}">*/
/*           <div class="panel-heading">*/
/*             <h4 class="panel-title">*/
/*               <a href="#{{ id }}-collapse-{{ loop.index }}" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#{{ id }}-collapse" aria-expanded="false">*/
/*                 {{ item.title }}*/
/*                 <i class="fa fa-caret-down"></i>*/
/*               </a>*/
/*             </h4>*/
/*           </div>*/
/*           <div class="{{ j3.classes(item.panel_classes) }}" id="{{ id }}-collapse-{{ loop.index }}">*/
/*             <div class="panel-body">*/
/*               {{ self.renderBlocksItem(item, _context) }}*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*       {% endfor %}*/
/*     </div>*/
/*   {% endif %}*/
/*   </div>*/
/* </div>*/
/* */
