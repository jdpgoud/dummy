<?php

/* journal3/template/journal3/module/popup_content.twig */
class __TwigTemplate_c9c23e12ff9dfa24c1306fd21e26ae013568572f8aa16a5513794739c6c79daa extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
";
        // line 2
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "
";
        // line 3
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "journal3/template/journal3/module/popup_content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/* {{ content }}*/
/* {{ footer }}*/
/* */
