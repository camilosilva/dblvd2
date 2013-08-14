<?php

/* main.json */
class __TwigTemplate_296ac5460565372af5a9dbd76bb57cb8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('mainbody', $context, $blocks);
    }

    public function block_mainbody($context, array $blocks = array())
    {
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('twigJson')->setJson(), "html", null, true);
        echo "
    ";
        // line 3
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "main.json";
    }

    public function getDebugInfo()
    {
        return array (  27 => 2,  21 => 1,  39 => 6,  35 => 5,  31 => 3,  28 => 2,);
    }
}
