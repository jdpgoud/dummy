<?php

/* journal3/template/account/login.twig */
class __TwigTemplate_31d06132b14819a29e94aec197cd0d3c5e3b4eae6af5bec6136c9315505eb66c extends Twig_Template
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
        if ( !$this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "isPopup", array(), "method")) {
            // line 3
            echo "<ul class=\"breadcrumb\">
  ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 5
                echo "  <li><a href=\"";
                echo $this->getAttribute($context["breadcrumb"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["breadcrumb"], "text", array());
                echo "</a></li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "</ul>
";
            // line 8
            if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "pageTitlePosition"), "method") == "top")) {
                // line 9
                echo "  <h1 class=\"title page-title\"><span>";
                echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                echo "</span></h1>
";
            }
            // line 11
            echo $this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "loadController", array(0 => "journal3/layout", 1 => "top"), "method");
            echo "
<div id=\"account-login\" class=\"container\">
  ";
            // line 13
            if ((isset($context["success"]) ? $context["success"] : null)) {
                // line 14
                echo "  <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
                echo (isset($context["success"]) ? $context["success"] : null);
                echo "</div>
  ";
            }
            // line 16
            echo "  ";
            if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
                // line 17
                echo "  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
                echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
                echo "</div>
  ";
            }
            // line 19
            echo "  <div class=\"row\">";
            echo (isset($context["column_left"]) ? $context["column_left"] : null);
            echo "
    ";
            // line 20
            if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 21
                echo "    ";
                $context["class"] = "col-sm-6";
                // line 22
                echo "    ";
            } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 23
                echo "    ";
                $context["class"] = "col-sm-9";
                // line 24
                echo "    ";
            } else {
                // line 25
                echo "    ";
                $context["class"] = "col-sm-12";
                // line 26
                echo "    ";
            }
            // line 27
            echo "    <div id=\"content\" class=\"";
            echo (isset($context["class"]) ? $context["class"] : null);
            echo "\">
      ";
            // line 28
            if (($this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "settings", array()), "get", array(0 => "pageTitlePosition"), "method") == "default")) {
                // line 29
                echo "        <h1 class=\"title page-title\">";
                echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                echo "</h1>
      ";
            }
            // line 31
            echo "      ";
            echo (isset($context["content_top"]) ? $context["content_top"] : null);
            echo "
      <div class=\"row login-box\">
        <div class=\"col-sm-6\">
          <div class=\"well\">
            <h2 class=\"title\">";
            // line 35
            echo (isset($context["text_new_customer"]) ? $context["text_new_customer"] : null);
            echo "</h2>
            <p><strong>";
            // line 36
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo "</strong></p>
            <p>";
            // line 37
            echo (isset($context["text_register_account"]) ? $context["text_register_account"] : null);
            echo "</p>
            <div class=\"buttons\">
              <div class=\"pull-right\">
                <a href=\"";
            // line 40
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a>
              </div>
            </div>
          </div>
        </div>
        <div class=\"col-sm-6\">
          <div class=\"well\">
";
        }
        // line 48
        echo "            <h2 class=\"title\" style=\"font-size: 20px; font-weight: 600; color: #666;\">";
        echo (isset($context["text_returning_customer"]) ? $context["text_returning_customer"] : null);
        echo "</h2>
            <p><strong>";
        // line 49
        echo (isset($context["text_i_am_returning_customer"]) ? $context["text_i_am_returning_customer"] : null);
        echo "</strong></p>


            <div class=\"login-tab-wrapper\">
              <input class=\"radio\" id=\"parent\" name=\"group\" type=\"radio\" checked>
              <input class=\"radio\" id=\"student\" name=\"group\" type=\"radio\">
              <div class=\"tabs\">
              <label class=\"tab\" id=\"parent-tab\" for=\"parent\">Parent</label>
              <label class=\"tab\" id=\"student-tab\" for=\"student\">Student</label>
                </div>
              <div class=\"panels\">
              <!-- Parent content  -->
              <div class=\"panel\" id=\"parent-panel\">
                <form action=\"";
        // line 62
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal login-form\">
                  <div class=\"form-group\">
                    <!-- <label class=\"control-label\" for=\"input-email\">";
        // line 64
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo "</label> -->
                    <input type=\"text\" name=\"email\" value=\"";
        // line 65
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo "\" id=\"input-email\" class=\"form-control\" />
                  </div>
                  <div class=\"form-group\">
                    <!-- <label class=\"control-label\" for=\"input-password\">";
        // line 68
        echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
        echo "</label> -->
                    <input type=\"password\" name=\"password\" value=\"";
        // line 69
        echo (isset($context["password"]) ? $context["password"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
        echo "\" id=\"input-password\" class=\"form-control\" />
                  
                  </div>
                  <div class=\"buttons\">
                    <div class=\"pull-right\">
                      <button type=\"submit\" class=\"btn btn-primary\" data-loading-text=\"<span>";
        // line 74
        echo (isset($context["text_submit"]) ? $context["text_submit"] : null);
        echo "</span>\"><span>";
        echo (isset($context["text_submit"]) ? $context["text_submit"] : null);
        echo "</span></button>
                    </div>
                  </div>

                  <div class=\"forgot-password\"><a href=\"";
        // line 78
        echo (isset($context["forgotten"]) ? $context["forgotten"] : null);
        echo "\" target=\"_top\">";
        echo (isset($context["text_forgotten"]) ? $context["text_forgotten"] : null);
        echo "</a></div>

                  <div class=\"buttons\">
                    <div class=\"pull-right\">
                      <a href=\"";
        // line 82
        echo (isset($context["register"]) ? $context["register"] : null);
        echo "\" class=\"btn btn-primary\">";
        echo (isset($context["text_register"]) ? $context["text_register"] : null);
        echo "</a>
                    </div>
                  </div>

                  <div class=\"login-note\">
                    <p>Dear user please register as a parent and then <br>you can share the user credentials with your child(ren)</p>
                  </div>
                  ";
        // line 89
        if ((isset($context["redirect"]) ? $context["redirect"] : null)) {
            // line 90
            echo "                  <input type=\"hidden\" name=\"redirect\" value=\"";
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
                  ";
        }
        // line 92
        echo "                </form>
              </div>

              <!-- Student content  -->
              <div class=\"panel\" id=\"student-panel\">
               
                <form action=\"";
        // line 98
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal login-form\">
                  <div class=\"form-group\">
                    <input type=\"text\" name=\"email\" value=\"";
        // line 100
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_phone"]) ? $context["entry_phone"] : null);
        echo "\" id=\"input-email\" class=\"form-control\" />
                  </div>
                  <div class=\"form-group\">
                    <input type=\"password\" name=\"password\" value=\"";
        // line 103
        echo (isset($context["password"]) ? $context["password"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_otp"]) ? $context["entry_otp"] : null);
        echo "\" id=\"input-password\" class=\"form-control\" />
                  
                  </div>
                  <div class=\"buttons\">
                    <div class=\"pull-right\">
                      <button type=\"submit\" class=\"btn btn-primary\" data-loading-text=\"<span>";
        // line 108
        echo (isset($context["text_submit"]) ? $context["text_submit"] : null);
        echo "</span>\"><span>";
        echo (isset($context["text_submit"]) ? $context["text_submit"] : null);
        echo "</span></button>
                    </div>
                  </div>

                  <div class=\"forgot-password\"><a href=\"#\" target=\"_top\">";
        // line 112
        echo (isset($context["text_resend"]) ? $context["text_resend"] : null);
        echo "</a></div>

                  ";
        // line 114
        if ((isset($context["redirect"]) ? $context["redirect"] : null)) {
            // line 115
            echo "                  <input type=\"hidden\" name=\"redirect\" value=\"";
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
                  ";
        }
        // line 117
        echo "                </form>
              </div>
              </div>
            </div>
            


          

            

";
        // line 128
        if ( !$this->getAttribute($this->getAttribute((isset($context["j3"]) ? $context["j3"] : null), "document", array()), "isPopup", array(), "method")) {
            // line 129
            echo "          </div>
        </div>
      </div>
      ";
            // line 132
            echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
            echo "</div>
    ";
            // line 133
            echo (isset($context["column_right"]) ? $context["column_right"] : null);
            echo "</div>
</div>
";
        }
        // line 136
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "journal3/template/account/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 136,  316 => 133,  312 => 132,  307 => 129,  305 => 128,  292 => 117,  286 => 115,  284 => 114,  279 => 112,  270 => 108,  260 => 103,  252 => 100,  247 => 98,  239 => 92,  233 => 90,  231 => 89,  219 => 82,  210 => 78,  201 => 74,  191 => 69,  187 => 68,  179 => 65,  175 => 64,  170 => 62,  154 => 49,  149 => 48,  136 => 40,  130 => 37,  126 => 36,  122 => 35,  114 => 31,  108 => 29,  106 => 28,  101 => 27,  98 => 26,  95 => 25,  92 => 24,  89 => 23,  86 => 22,  83 => 21,  81 => 20,  76 => 19,  70 => 17,  67 => 16,  61 => 14,  59 => 13,  54 => 11,  48 => 9,  46 => 8,  43 => 7,  32 => 5,  28 => 4,  25 => 3,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/* {% if not j3.document.isPopup() %}*/
/* <ul class="breadcrumb">*/
/*   {% for breadcrumb in breadcrumbs %}*/
/*   <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*   {% endfor %}*/
/* </ul>*/
/* {% if j3.settings.get('pageTitlePosition') == 'top' %}*/
/*   <h1 class="title page-title"><span>{{ heading_title }}</span></h1>*/
/* {% endif %}*/
/* {{ j3.loadController('journal3/layout', 'top') }}*/
/* <div id="account-login" class="container">*/
/*   {% if success %}*/
/*   <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}</div>*/
/*   {% endif %}*/
/*   {% if error_warning %}*/
/*   <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>*/
/*   {% endif %}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">*/
/*       {% if j3.settings.get('pageTitlePosition') == 'default' %}*/
/*         <h1 class="title page-title">{{ heading_title }}</h1>*/
/*       {% endif %}*/
/*       {{ content_top }}*/
/*       <div class="row login-box">*/
/*         <div class="col-sm-6">*/
/*           <div class="well">*/
/*             <h2 class="title">{{ text_new_customer }}</h2>*/
/*             <p><strong>{{ text_register }}</strong></p>*/
/*             <p>{{ text_register_account }}</p>*/
/*             <div class="buttons">*/
/*               <div class="pull-right">*/
/*                 <a href="{{ register }}" class="btn btn-primary">{{ button_continue }}</a>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         <div class="col-sm-6">*/
/*           <div class="well">*/
/* {% endif %}*/
/*             <h2 class="title" style="font-size: 20px; font-weight: 600; color: #666;">{{ text_returning_customer }}</h2>*/
/*             <p><strong>{{ text_i_am_returning_customer }}</strong></p>*/
/* */
/* */
/*             <div class="login-tab-wrapper">*/
/*               <input class="radio" id="parent" name="group" type="radio" checked>*/
/*               <input class="radio" id="student" name="group" type="radio">*/
/*               <div class="tabs">*/
/*               <label class="tab" id="parent-tab" for="parent">Parent</label>*/
/*               <label class="tab" id="student-tab" for="student">Student</label>*/
/*                 </div>*/
/*               <div class="panels">*/
/*               <!-- Parent content  -->*/
/*               <div class="panel" id="parent-panel">*/
/*                 <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal login-form">*/
/*                   <div class="form-group">*/
/*                     <!-- <label class="control-label" for="input-email">{{ entry_email }}</label> -->*/
/*                     <input type="text" name="email" value="{{ email }}" placeholder="{{ entry_email }}" id="input-email" class="form-control" />*/
/*                   </div>*/
/*                   <div class="form-group">*/
/*                     <!-- <label class="control-label" for="input-password">{{ entry_password }}</label> -->*/
/*                     <input type="password" name="password" value="{{ password }}" placeholder="{{ entry_password }}" id="input-password" class="form-control" />*/
/*                   */
/*                   </div>*/
/*                   <div class="buttons">*/
/*                     <div class="pull-right">*/
/*                       <button type="submit" class="btn btn-primary" data-loading-text="<span>{{ text_submit }}</span>"><span>{{ text_submit }}</span></button>*/
/*                     </div>*/
/*                   </div>*/
/* */
/*                   <div class="forgot-password"><a href="{{ forgotten }}" target="_top">{{ text_forgotten }}</a></div>*/
/* */
/*                   <div class="buttons">*/
/*                     <div class="pull-right">*/
/*                       <a href="{{ register }}" class="btn btn-primary">{{ text_register }}</a>*/
/*                     </div>*/
/*                   </div>*/
/* */
/*                   <div class="login-note">*/
/*                     <p>Dear user please register as a parent and then <br>you can share the user credentials with your child(ren)</p>*/
/*                   </div>*/
/*                   {% if redirect %}*/
/*                   <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*                   {% endif %}*/
/*                 </form>*/
/*               </div>*/
/* */
/*               <!-- Student content  -->*/
/*               <div class="panel" id="student-panel">*/
/*                */
/*                 <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal login-form">*/
/*                   <div class="form-group">*/
/*                     <input type="text" name="email" value="{{ email }}" placeholder="{{ entry_phone }}" id="input-email" class="form-control" />*/
/*                   </div>*/
/*                   <div class="form-group">*/
/*                     <input type="password" name="password" value="{{ password }}" placeholder="{{ entry_otp }}" id="input-password" class="form-control" />*/
/*                   */
/*                   </div>*/
/*                   <div class="buttons">*/
/*                     <div class="pull-right">*/
/*                       <button type="submit" class="btn btn-primary" data-loading-text="<span>{{ text_submit }}</span>"><span>{{ text_submit }}</span></button>*/
/*                     </div>*/
/*                   </div>*/
/* */
/*                   <div class="forgot-password"><a href="#" target="_top">{{ text_resend }}</a></div>*/
/* */
/*                   {% if redirect %}*/
/*                   <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*                   {% endif %}*/
/*                 </form>*/
/*               </div>*/
/*               </div>*/
/*             </div>*/
/*             */
/* */
/* */
/*           */
/* */
/*             */
/* */
/* {% if not j3.document.isPopup() %}*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {% endif %}*/
/* {{ footer }}*/
/* */
