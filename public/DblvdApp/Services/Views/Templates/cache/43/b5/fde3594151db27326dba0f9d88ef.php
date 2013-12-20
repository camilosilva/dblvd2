<?php

/* es.main.json */
class __TwigTemplate_43b5fde3594151db27326dba0f9d88ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("main.json");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.json";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "{
    \"response\":\"success\",
    \"welcome\": \"";
        // line 5
        if (isset($context["data"])) { $_data_ = $context["data"]; } else { $_data_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_data_, "welcome"), "html", null, true);
        echo "\",
    \"greeting\": \"";
        // line 6
        if (isset($context["data"])) { $_data_ = $context["data"]; } else { $_data_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_data_, "greeting"), "html", null, true);
        echo "\",
    \"language\": \"es\"
}
";
    }

    public function getTemplateName()
    {
        return "es.main.json";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  35 => 5,  31 => 3,  28 => 2,);
    }
}
