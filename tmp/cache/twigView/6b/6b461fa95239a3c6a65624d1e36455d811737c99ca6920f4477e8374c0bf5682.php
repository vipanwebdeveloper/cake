<?php

/* F:\xampp\htdocs\cake\vendor\cakephp\bake\src\Template\Bake\Layout\default.twig */
class __TwigTemplate_01ed4b4dc221cfbb80eb694fdd97ee54acb9fa4194dfe0e2c611ad8d2b44ece1 extends Twig_Template
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
        $__internal_a425f6699d3907460bd1c7c5b9ee0b1373e10c94434a3a427e17907111039f41 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_a425f6699d3907460bd1c7c5b9ee0b1373e10c94434a3a427e17907111039f41->enter($__internal_a425f6699d3907460bd1c7c5b9ee0b1373e10c94434a3a427e17907111039f41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "F:\\xampp\\htdocs\\cake\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig"));

        // line 16
        echo $this->getAttribute(($context["_view"] ?? null), "fetch", array(0 => "content"), "method");
        
        $__internal_a425f6699d3907460bd1c7c5b9ee0b1373e10c94434a3a427e17907111039f41->leave($__internal_a425f6699d3907460bd1c7c5b9ee0b1373e10c94434a3a427e17907111039f41_prof);

    }

    public function getTemplateName()
    {
        return "F:\\xampp\\htdocs\\cake\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{{ _view.fetch('content')|raw }}", "F:\\xampp\\htdocs\\cake\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig", "F:\\xampp\\htdocs\\cake\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig");
    }
}
