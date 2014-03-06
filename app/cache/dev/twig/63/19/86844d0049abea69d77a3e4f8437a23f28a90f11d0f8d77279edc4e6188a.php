<?php

/* BloggerBlogBundle::layout.html.twig */
class __TwigTemplate_631986844d0049abea69d77a3e4f8437a23f28a90f11d0f8d77279edc4e6188a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 6
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b41c622_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger_part_1_blog_1.css");
            // line 11
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
    ";
            // asset "b41c622_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger_part_1_sidebar_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
    ";
        } else {
            // asset "b41c622"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b41c622") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/blogger.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
    ";
        }
        unset($context["asset_url"]);
    }

    // line 15
    public function block_sidebar($context, array $blocks = array())
    {
        // line 16
        echo "    ";
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("BloggerBlogBundle:Page:sidebar"), array());
    }

    public function getTemplateName()
    {
        return "BloggerBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  63 => 15,  41 => 11,  32 => 5,  29 => 4,  92 => 25,  83 => 21,  77 => 20,  71 => 19,  64 => 15,  60 => 14,  55 => 12,  47 => 9,  40 => 7,  37 => 6,  31 => 5,  28 => 4,);
    }
}
