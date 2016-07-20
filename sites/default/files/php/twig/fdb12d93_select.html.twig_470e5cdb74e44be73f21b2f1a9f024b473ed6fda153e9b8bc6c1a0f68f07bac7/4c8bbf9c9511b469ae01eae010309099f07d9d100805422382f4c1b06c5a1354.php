<?php

/* themes/bootstrap/templates/input/select.html.twig */
class __TwigTemplate_ca8694cf04958ca117ef3ebc8c1cbcbafd5a6dd626063f14242a7c4cbcbba655 extends Twig_Template
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
        $tags = array("spaceless" => 18, "if" => 19, "set" => 32, "for" => 34);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('spaceless', 'if', 'set', 'for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 18
        ob_start();
        // line 19
        echo "  ";
        if ((isset($context["input_group"]) ? $context["input_group"] : null)) {
            // line 20
            echo "    <div class=\"input-group\">
  ";
        }
        // line 22
        echo "
  ";
        // line 23
        if ((isset($context["prefix"]) ? $context["prefix"] : null)) {
            // line 24
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["prefix"]) ? $context["prefix"] : null), "html", null, true));
            echo "
  ";
        }
        // line 26
        echo "
  ";
        // line 31
        echo "  <div class=\"select-wrapper\">
    ";
        // line 32
        $context["classes"] = array(0 => "form-control");
        // line 33
        echo "    <select";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
      ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 35
            echo "        ";
            if (($this->getAttribute($context["option"], "type", array()) == "optgroup")) {
                // line 36
                echo "          <optgroup label=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "label", array()), "html", null, true));
                echo "\">
            ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["option"], "options", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_option"]) {
                    // line 38
                    echo "              <option
                value=\"";
                    // line 39
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["sub_option"], "value", array()), "html", null, true));
                    echo "\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((($this->getAttribute($context["sub_option"], "selected", array())) ? (" selected=\"selected\"") : (""))));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["sub_option"], "label", array()), "html", null, true));
                    echo "</option>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "          </optgroup>
        ";
            } elseif (($this->getAttribute(            // line 42
$context["option"], "type", array()) == "option")) {
                // line 43
                echo "          <option
            value=\"";
                // line 44
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "value", array()), "html", null, true));
                echo "\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((($this->getAttribute($context["option"], "selected", array())) ? (" selected=\"selected\"") : (""))));
                echo ">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["option"], "label", array()), "html", null, true));
                echo "</option>
        ";
            }
            // line 46
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "    </select>
  </div>

  ";
        // line 50
        if ((isset($context["suffix"]) ? $context["suffix"] : null)) {
            // line 51
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["suffix"]) ? $context["suffix"] : null), "html", null, true));
            echo "
  ";
        }
        // line 53
        echo "
  ";
        // line 54
        if ((isset($context["input_group"]) ? $context["input_group"] : null)) {
            // line 55
            echo "    </div>
  ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/input/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 55,  146 => 54,  143 => 53,  137 => 51,  135 => 50,  130 => 47,  124 => 46,  115 => 44,  112 => 43,  110 => 42,  107 => 41,  95 => 39,  92 => 38,  88 => 37,  83 => 36,  80 => 35,  76 => 34,  71 => 33,  69 => 32,  66 => 31,  63 => 26,  57 => 24,  55 => 23,  52 => 22,  48 => 20,  45 => 19,  43 => 18,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a select element.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the select tag.*/
/*  * - input_group: Flag to display as an input group.*/
/*  * - options: The option element children.*/
/*  * - prefix: Markup to display before the input element.*/
/*  * - suffix: Markup to display after the input element.*/
/*  **/
/*  * @ingroup templates*/
/*  **/
/*  * @see template_preprocess_select()*/
/*  *//* */
/* #}*/
/* {% spaceless %}*/
/*   {% if input_group %}*/
/*     <div class="input-group">*/
/*   {% endif %}*/
/* */
/*   {% if prefix %}*/
/*     {{ prefix }}*/
/*   {% endif %}*/
/* */
/*   {# Browsers do not recognize pseudo :after selectors, we must create a wrapper*/
/*    # around the select element to style it properly.*/
/*    # @see http://stackoverflow.com/q/21103542*/
/*    #}*/
/*   <div class="select-wrapper">*/
/*     {% set classes = ['form-control'] %}*/
/*     <select{{ attributes.addClass(classes) }}>*/
/*       {% for option in options %}*/
/*         {% if option.type == 'optgroup' %}*/
/*           <optgroup label="{{ option.label }}">*/
/*             {% for sub_option in option.options %}*/
/*               <option*/
/*                 value="{{ sub_option.value }}"{{ sub_option.selected ? ' selected="selected"' }}>{{ sub_option.label }}</option>*/
/*             {% endfor %}*/
/*           </optgroup>*/
/*         {% elseif option.type == 'option' %}*/
/*           <option*/
/*             value="{{ option.value }}"{{ option.selected ? ' selected="selected"' }}>{{ option.label }}</option>*/
/*         {% endif %}*/
/*       {% endfor %}*/
/*     </select>*/
/*   </div>*/
/* */
/*   {% if suffix %}*/
/*     {{ suffix }}*/
/*   {% endif %}*/
/* */
/*   {% if input_group %}*/
/*     </div>*/
/*   {% endif %}*/
/* {% endspaceless %}*/
/* */
