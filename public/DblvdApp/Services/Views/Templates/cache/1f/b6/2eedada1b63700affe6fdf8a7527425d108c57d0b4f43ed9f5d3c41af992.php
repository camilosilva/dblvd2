<?php

/* main.html */
class __TwigTemplate_1fb62eedada1b63700affe6fdf8a7527425d108c57d0b4f43ed9f5d3c41af992 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    </head>
    <body>
        <h1>";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "greeting"), "html", null, true);
        echo "</h1>
        <div id=\"content\">";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
        <div id=\"footer\">
            ";
        // line 15
        $this->displayBlock('footer', $context, $blocks);
        // line 18
        echo "        </div>
        <script src=\"http://code.jquery.com/jquery.js\"></script>
        <script src=\"/javascripts/bootstrap.js\"></script>
    </body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <link rel=\"stylesheet\" href=\"/stylesheets/bootstrap.css\" media=\"screen\" />
            <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - Twig Demo</title>
        ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
    }

    // line 15
    public function block_footer($context, array $blocks = array())
    {
        // line 16
        echo "                &copy; Copyright 2013 by <a href=\"http://www.camilo-silva.com/\">Camilo Silva</a>.
            ";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 16,  76 => 15,  71 => 13,  61 => 6,  58 => 5,  55 => 4,  47 => 18,  45 => 15,  40 => 13,  28 => 4,  23 => 1,  56 => 13,  52 => 11,  49 => 10,  39 => 5,  36 => 12,  30 => 8,);
    }
}
