<?php

/* /opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Template/add.twig */
class __TwigTemplate_b5663e83eae05a64851cabddee7a16249be226671994ba19dc2c5a9035b006e7 extends Twig_Template
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
        $__internal_4167b5fb5e8c0e0473baf904aa68dd5686ec940cbeb73e17617c614a22ba5e05 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_4167b5fb5e8c0e0473baf904aa68dd5686ec940cbeb73e17617c614a22ba5e05->enter($__internal_4167b5fb5e8c0e0473baf904aa68dd5686ec940cbeb73e17617c614a22ba5e05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Template/add.twig"));

        // line 16
        echo "<?php
/**
 * @var \\";
        // line 18
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\View\\AppView \$this
 * @var \\";
        // line 19
        echo twig_escape_filter($this->env, ($context["entityClass"] ?? null), "html", null, true);
        echo " \$";
        echo twig_escape_filter($this->env, ($context["singularVar"] ?? null), "html", null, true);
        echo "
 */
?>
";
        // line 22
echo $context['_view']->element("form",array(),array());
        
        $__internal_4167b5fb5e8c0e0473baf904aa68dd5686ec940cbeb73e17617c614a22ba5e05->leave($__internal_4167b5fb5e8c0e0473baf904aa68dd5686ec940cbeb73e17617c614a22ba5e05_prof);

    }

    public function getTemplateName()
    {
        return "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Template/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 22,  30 => 19,  26 => 18,  22 => 16,);
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
<?php
/**
 * @var \\{{ namespace }}\\View\\AppView \$this
 * @var \\{{ entityClass }} \${{ singularVar }}
 */
?>
{% element 'form' %}
", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Template/add.twig", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Template/add.twig");
    }
}
