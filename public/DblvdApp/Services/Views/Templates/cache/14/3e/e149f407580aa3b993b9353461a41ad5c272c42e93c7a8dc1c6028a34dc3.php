<?php

/* ja.main.html */
class __TwigTemplate_143ee149f407580aa3b993b9353461a41ad5c272c42e93c7a8dc1c6028a34dc3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("main.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "日本語版";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <style type=\"text/css\">
        .important { color: #336699; }
    </style>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "    <h2>Twig デモ</h2>
    <p class=\"important\">
        ";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "welcome"), "html", null, true);
        echo "
    </p>
";
    }

    public function getTemplateName()
    {
        return "ja.main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 13,  52 => 11,  49 => 10,  39 => 5,  36 => 4,  30 => 3,);
    }
}
