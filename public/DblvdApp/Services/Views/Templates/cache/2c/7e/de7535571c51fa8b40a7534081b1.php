<?php

/* en.main.json */
class __TwigTemplate_2c7ede7535571c51fa8b40a7534081b1 extends Twig_Template
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
        if (isset($context["data"])) { $_data_ = $context["data"]; } else { $_data_ = null; }
        if (isset($context["JSON_PRETTY_PRINT"])) { $_JSON_PRETTY_PRINT_ = $context["JSON_PRETTY_PRINT"]; } else { $_JSON_PRETTY_PRINT_ = null; }
        echo twig_jsonencode_filter($_data_, twig_constant($_JSON_PRETTY_PRINT_));
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
