<?php

/* ::base.html.twig */
class __TwigTemplate_704f01e8432f48bf8d09b83ea1ebb8734379111423a8bd5a226e8294efb0f5db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'customcss' => array($this, 'block_customcss'),
            'navbar' => array($this, 'block_navbar'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
            'customjs' => array($this, 'block_customjs'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "            
        ";
        // line 10
        $this->displayBlock('customcss', $context, $blocks);
        // line 12
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div class=\"container-fluid\">
            ";
        // line 16
        $this->displayBlock('navbar', $context, $blocks);
        // line 21
        echo "
            ";
        // line 22
        $this->displayBlock('body', $context, $blocks);
        // line 29
        echo "            
            ";
        // line 30
        $this->displayBlock('footer', $context, $blocks);
        // line 35
        echo "            
            ";
        // line 36
        $this->displayBlock('javascripts', $context, $blocks);
        // line 40
        echo "                
            ";
        // line 41
        $this->displayBlock('customjs', $context, $blocks);
        // line 44
        echo "        </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        ";
    }

    // line 10
    public function block_customcss($context, array $blocks = array())
    {
        // line 11
        echo "        ";
    }

    // line 16
    public function block_navbar($context, array $blocks = array())
    {
        // line 17
        echo "            <div class=\"row\">
                
            </div>
            ";
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        // line 23
        echo "            <div class=\"row\">
                <div class=\"col-md-12\">
                <h1>Hello, you are processed by the main bundle!</h1>
                </div>
            </div>
            ";
    }

    // line 30
    public function block_footer($context, array $blocks = array())
    {
        // line 31
        echo "            <div class=\"row\">
                
            </div>
            ";
    }

    // line 36
    public function block_javascripts($context, array $blocks = array())
    {
        // line 37
        echo "                <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
            ";
    }

    // line 41
    public function block_customjs($context, array $blocks = array())
    {
        // line 42
        echo "                
            ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 42,  150 => 41,  144 => 38,  139 => 37,  136 => 36,  129 => 31,  126 => 30,  117 => 23,  114 => 22,  107 => 17,  104 => 16,  100 => 11,  97 => 10,  90 => 7,  87 => 6,  81 => 5,  74 => 44,  72 => 41,  69 => 40,  67 => 36,  62 => 30,  59 => 29,  57 => 22,  54 => 21,  42 => 10,  37 => 6,  33 => 5,  27 => 1,  98 => 19,  84 => 17,  79 => 16,  73 => 15,  68 => 13,  64 => 35,  60 => 11,  56 => 10,  52 => 16,  48 => 8,  44 => 12,  39 => 9,  36 => 5,  30 => 3,);
    }
}
