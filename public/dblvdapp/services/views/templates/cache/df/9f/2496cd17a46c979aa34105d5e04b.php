<?php

/* en.main.json */
class __TwigTemplate_df9f2496cd17a46c979aa34105d5e04b extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('twigJson')->setJson(), "html", null, true);
        echo "
";
        // line 2
        echo twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : null), twig_constant((isset($context["JSON_PRETTY_PRINT"]) ? $context["JSON_PRETTY_PRINT"] : null)));
        echo "
";
    }

    public function getTemplateName()
    {
        return "en.main.json";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 2,  19 => 1,);
    }
}
