<?php

/* themes/bootstrap/templates/views/views-view-table.html.twig */
class __TwigTemplate_4f4441e6dba417e89477891da6f7fed5fd69c6bcc42b36cc7e36647b7bd43fdb extends Twig_Template
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
        $tags = array("if" => 29, "set" => 32, "for" => 62);
        $filters = array("merge" => 99);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set', 'for'),
                array('merge'),
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

        // line 29
        if ($this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_responsive", array())) {
            // line 30
            echo "  <div class=\"table-responsive\">
";
        }
        // line 32
        $context["classes"] = array(0 => "table", 1 => ((( !twig_test_empty($this->getAttribute(        // line 34
(isset($context["context"]) ? $context["context"] : null), "bordered", array())) || $this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_bordered", array()))) ? ("table-bordered") : ("")), 2 => ((( !twig_test_empty($this->getAttribute(        // line 35
(isset($context["context"]) ? $context["context"] : null), "condensed", array())) || $this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_condensed", array()))) ? ("table-condensed") : ("")), 3 => ((( !twig_test_empty($this->getAttribute(        // line 36
(isset($context["context"]) ? $context["context"] : null), "hover", array())) || $this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_hover", array()))) ? ("table-hover") : ("")), 4 => ((( !twig_test_empty($this->getAttribute(        // line 37
(isset($context["context"]) ? $context["context"] : null), "striped", array())) || $this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_striped", array()))) ? ("table-striped") : ("")));
        // line 39
        echo "<table";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 40
        if ((isset($context["caption_needed"]) ? $context["caption_needed"] : null)) {
            // line 41
            echo "    <caption>
      ";
            // line 42
            if ((isset($context["caption"]) ? $context["caption"] : null)) {
                // line 43
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["caption"]) ? $context["caption"] : null), "html", null, true));
                echo "
      ";
            } else {
                // line 45
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
                echo "
      ";
            }
            // line 47
            echo "      ";
            if (( !twig_test_empty((isset($context["summary"]) ? $context["summary"] : null)) ||  !twig_test_empty((isset($context["description"]) ? $context["description"] : null)))) {
                // line 48
                echo "        <details>
          ";
                // line 49
                if ( !twig_test_empty((isset($context["summary"]) ? $context["summary"] : null))) {
                    // line 50
                    echo "            <summary>";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["summary"]) ? $context["summary"] : null), "html", null, true));
                    echo "</summary>
          ";
                }
                // line 52
                echo "          ";
                if ( !twig_test_empty((isset($context["description"]) ? $context["description"] : null))) {
                    // line 53
                    echo "            ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["description"]) ? $context["description"] : null), "html", null, true));
                    echo "
          ";
                }
                // line 55
                echo "        </details>
      ";
            }
            // line 57
            echo "    </caption>
  ";
        }
        // line 59
        echo "  ";
        if ((isset($context["header"]) ? $context["header"] : null)) {
            // line 60
            echo "    <thead>
    <tr>
      ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["header"]) ? $context["header"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 63
                echo "        ";
                if ($this->getAttribute($context["column"], "default_classes", array())) {
                    // line 64
                    echo "          ";
                    // line 65
                    $context["column_classes"] = array(0 => "views-field", 1 => ("views-field-" . $this->getAttribute(                    // line 67
(isset($context["fields"]) ? $context["fields"] : null), $context["key"], array(), "array")));
                    // line 70
                    echo "        ";
                }
                // line 71
                echo "      <th";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["column"], "attributes", array()), "addClass", array(0 => (isset($context["column_classes"]) ? $context["column_classes"] : null)), "method"), "setAttribute", array(0 => "scope", 1 => "col"), "method"), "html", null, true));
                echo ">";
                // line 72
                if ($this->getAttribute($context["column"], "wrapper_element", array())) {
                    // line 73
                    echo "<";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "wrapper_element", array()), "html", null, true));
                    echo ">";
                    // line 74
                    if ($this->getAttribute($context["column"], "url", array())) {
                        // line 75
                        echo "<a href=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "url", array()), "html", null, true));
                        echo "\" title=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "title", array()), "html", null, true));
                        echo "\">";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "content", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "sort_indicator", array()), "html", null, true));
                        echo "</a>";
                    } else {
                        // line 77
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "content", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "sort_indicator", array()), "html", null, true));
                    }
                    // line 79
                    echo "</";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "wrapper_element", array()), "html", null, true));
                    echo ">";
                } else {
                    // line 81
                    if ($this->getAttribute($context["column"], "url", array())) {
                        // line 82
                        echo "<a href=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "url", array()), "html", null, true));
                        echo "\" title=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "title", array()), "html", null, true));
                        echo "\">";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "content", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "sort_indicator", array()), "html", null, true));
                        echo "</a>";
                    } else {
                        // line 84
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "content", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "sort_indicator", array()), "html", null, true));
                    }
                }
                // line 87
                echo "</th>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "    </tr>
    </thead>
  ";
        }
        // line 92
        echo "  <tbody>
  ";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 94
            echo "    <tr";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "attributes", array()), "html", null, true));
            echo ">
      ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "columns", array()));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 96
                echo "        ";
                if ($this->getAttribute($context["column"], "default_classes", array())) {
                    // line 97
                    echo "          ";
                    $context["column_classes"] = array(0 => "views-field");
                    // line 98
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "fields", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 99
                        echo "            ";
                        $context["column_classes"] = twig_array_merge((isset($context["column_classes"]) ? $context["column_classes"] : null), array(0 => ("views-field-" . $context["field"])));
                        // line 100
                        echo "          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 101
                    echo "        ";
                }
                // line 102
                echo "      <td";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["column"], "attributes", array()), "addClass", array(0 => (isset($context["column_classes"]) ? $context["column_classes"] : null)), "method"), "html", null, true));
                echo ">";
                // line 103
                if ($this->getAttribute($context["column"], "wrapper_element", array())) {
                    // line 104
                    echo "<";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "wrapper_element", array()), "html", null, true));
                    echo ">
          ";
                    // line 105
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 106
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["content"], "separator", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["content"], "field_output", array()), "html", null, true));
                        echo "
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 108
                    echo "          </";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["column"], "wrapper_element", array()), "html", null, true));
                    echo ">";
                } else {
                    // line 110
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 111
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["content"], "separator", array()), "html", null, true));
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["content"], "field_output", array()), "html", null, true));
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 114
                echo "        </td>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "    </tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "  </tbody>
</table>
";
        // line 120
        if ($this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "table_responsive", array())) {
            // line 121
            echo "  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/bootstrap/templates/views/views-view-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 121,  291 => 120,  287 => 118,  280 => 116,  273 => 114,  265 => 111,  261 => 110,  256 => 108,  246 => 106,  242 => 105,  237 => 104,  235 => 103,  231 => 102,  228 => 101,  222 => 100,  219 => 99,  214 => 98,  211 => 97,  208 => 96,  204 => 95,  199 => 94,  195 => 93,  192 => 92,  187 => 89,  180 => 87,  175 => 84,  165 => 82,  163 => 81,  158 => 79,  154 => 77,  144 => 75,  142 => 74,  138 => 73,  136 => 72,  132 => 71,  129 => 70,  127 => 67,  126 => 65,  124 => 64,  121 => 63,  117 => 62,  113 => 60,  110 => 59,  106 => 57,  102 => 55,  96 => 53,  93 => 52,  87 => 50,  85 => 49,  82 => 48,  79 => 47,  73 => 45,  67 => 43,  65 => 42,  62 => 41,  60 => 40,  55 => 39,  53 => 37,  52 => 36,  51 => 35,  50 => 34,  49 => 32,  45 => 30,  43 => 29,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for displaying a view as a table.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: Remaining HTML attributes for the element.*/
/*  *   - class: HTML classes that can be used to style contextually through CSS.*/
/*  * - title : The title of this group of rows.*/
/*  * - header: The table header columns.*/
/*  *   - attributes: Remaining HTML attributes for the element.*/
/*  *   - content: HTML classes to apply to each header cell, indexed by*/
/*  *   the header's key.*/
/*  * - caption_needed: Is the caption tag needed.*/
/*  * - caption: The caption for this table.*/
/*  * - accessibility_description: Extended description for the table details.*/
/*  * - accessibility_summary: Summary for the table details.*/
/*  * - rows: Table row items. Rows are keyed by row number.*/
/*  *   - attributes: HTML classes to apply to each row.*/
/*  *   - columns: Row column items. Columns are keyed by column number.*/
/*  *     - attributes: HTML classes to apply to each column.*/
/*  *     - content: The column content.*/
/*  **/
/*  * @ingroup templates*/
/*  **/
/*  * @see template_preprocess_views_view_table()*/
/*  *//* */
/* #}*/
/* {% if theme.settings.table_responsive %}*/
/*   <div class="table-responsive">*/
/* {% endif %}*/
/* {% set classes = [*/
/*   'table',*/
/*   context.bordered is not empty or theme.settings.table_bordered ? 'table-bordered',*/
/*   context.condensed is not empty or theme.settings.table_condensed ? 'table-condensed',*/
/*   context.hover is not empty or theme.settings.table_hover ? 'table-hover',*/
/*   context.striped is not empty or theme.settings.table_striped ? 'table-striped',*/
/* ] %}*/
/* <table{{ attributes.addClass(classes) }}>*/
/*   {% if caption_needed %}*/
/*     <caption>*/
/*       {% if caption %}*/
/*         {{ caption }}*/
/*       {% else %}*/
/*         {{ title }}*/
/*       {% endif %}*/
/*       {% if (summary is not empty) or (description is not empty) %}*/
/*         <details>*/
/*           {% if summary is not empty %}*/
/*             <summary>{{ summary }}</summary>*/
/*           {% endif %}*/
/*           {% if description is not empty %}*/
/*             {{ description }}*/
/*           {% endif %}*/
/*         </details>*/
/*       {% endif %}*/
/*     </caption>*/
/*   {% endif %}*/
/*   {% if header %}*/
/*     <thead>*/
/*     <tr>*/
/*       {% for key, column in header %}*/
/*         {% if column.default_classes %}*/
/*           {%*/
/*           set column_classes = [*/
/*           'views-field',*/
/*           'views-field-' ~ fields[key],*/
/*           ]*/
/*           %}*/
/*         {% endif %}*/
/*       <th{{ column.attributes.addClass(column_classes).setAttribute('scope', 'col') }}>*/
/*         {%- if column.wrapper_element -%}*/
/*           <{{ column.wrapper_element }}>*/
/*           {%- if column.url -%}*/
/*             <a href="{{ column.url }}" title="{{ column.title }}">{{ column.content }}{{ column.sort_indicator }}</a>*/
/*           {%- else -%}*/
/*             {{ column.content }}{{ column.sort_indicator }}*/
/*           {%- endif -%}*/
/*           </{{ column.wrapper_element }}>*/
/*         {%- else -%}*/
/*           {%- if column.url -%}*/
/*             <a href="{{ column.url }}" title="{{ column.title }}">{{ column.content }}{{ column.sort_indicator }}</a>*/
/*           {%- else -%}*/
/*             {{- column.content }}{{ column.sort_indicator }}*/
/*           {%- endif -%}*/
/*         {%- endif -%}*/
/*         </th>*/
/*       {% endfor %}*/
/*     </tr>*/
/*     </thead>*/
/*   {% endif %}*/
/*   <tbody>*/
/*   {% for row in rows %}*/
/*     <tr{{ row.attributes }}>*/
/*       {% for key, column in row.columns %}*/
/*         {% if column.default_classes %}*/
/*           {% set column_classes = [ 'views-field' ] %}*/
/*           {% for field in column.fields %}*/
/*             {% set column_classes = column_classes|merge(['views-field-' ~ field]) %}*/
/*           {% endfor %}*/
/*         {% endif %}*/
/*       <td{{ column.attributes.addClass(column_classes) }}>*/
/*         {%- if column.wrapper_element -%}*/
/*           <{{ column.wrapper_element }}>*/
/*           {% for content in column.content %}*/
/*             {{ content.separator }}{{ content.field_output }}*/
/*           {% endfor %}*/
/*           </{{ column.wrapper_element }}>*/
/*         {%- else -%}*/
/*           {% for content in column.content %}*/
/*             {{- content.separator }}{{ content.field_output -}}*/
/*           {% endfor %}*/
/*         {%- endif %}*/
/*         </td>*/
/*       {% endfor %}*/
/*     </tr>*/
/*   {% endfor %}*/
/*   </tbody>*/
/* </table>*/
/* {% if theme.settings.table_responsive %}*/
/*   </div>*/
/* {% endif %}*/
/* */
