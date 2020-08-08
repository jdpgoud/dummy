<?php

/* journal3/template/journal3/module/popup_page.twig */
class __TwigTemplate_a1997aa74fb5b78c312e7dff980d6b98cb2801d5e9501fdad57dc94501f4af3c extends Twig_Template
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
        echo "<html>
<head>
  <style>";
        // line 3
        echo (isset($context["css"]) ? $context["css"] : null);
        echo "</style>
</head>
<body>
";
        // line 6
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "journal3/template/journal3/module/popup_page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 6,  23 => 3,  19 => 1,);
    }
}
/* <html>*/
/* <head>*/
/*   <style>{{ css }}</style>*/
/* </head>*/
/* <body>*/
/* {{ content }}*/
/* </body>*/
/* </html>*/
/* */
