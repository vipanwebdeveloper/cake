<?php

/* /opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Form/form.twig */
class __TwigTemplate_3b22d82372b97dce204e22be84bef8c7093a8e6b93a7c79cd14cff44c77c8461 extends Twig_Template
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
        $__internal_7a196f2d215c2646e3b5baa2df1dfdfc15d033f09458bb4ddc2e1ad6c80b69cb = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_7a196f2d215c2646e3b5baa2df1dfdfc15d033f09458bb4ddc2e1ad6c80b69cb->enter($__internal_7a196f2d215c2646e3b5baa2df1dfdfc15d033f09458bb4ddc2e1ad6c80b69cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Form/form.twig"));

        // line 16
        echo "<?php
namespace ";
        // line 17
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\Form;

use Cake\\Form\\Form;
use Cake\\Form\\Schema;
use Cake\\Validation\\Validator;

/**
 * ";
        // line 24
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " Form.
 */
class ";
        // line 26
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Form extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \\Cake\\Form\\Schema \$schema From schema
     * @return \\Cake\\Form\\Schema
     */
    protected function _buildSchema(Schema \$schema)
    {
        return \$schema;
    }

    /**
     * Form validation builder
     *
     * @param \\Cake\\Validation\\Validator \$validator to use against the form
     * @return \\Cake\\Validation\\Validator
     */
    protected function _buildValidator(Validator \$validator)
    {
        return \$validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array \$data Form data.
     * @return bool
     */
    protected function _execute(array \$data)
    {
        return true;
    }
}
";
        
        $__internal_7a196f2d215c2646e3b5baa2df1dfdfc15d033f09458bb4ddc2e1ad6c80b69cb->leave($__internal_7a196f2d215c2646e3b5baa2df1dfdfc15d033f09458bb4ddc2e1ad6c80b69cb_prof);

    }

    public function getTemplateName()
    {
        return "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Form/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 26,  35 => 24,  25 => 17,  22 => 16,);
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
namespace {{ namespace }}\\Form;

use Cake\\Form\\Form;
use Cake\\Form\\Schema;
use Cake\\Validation\\Validator;

/**
 * {{ name }} Form.
 */
class {{ name }}Form extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \\Cake\\Form\\Schema \$schema From schema
     * @return \\Cake\\Form\\Schema
     */
    protected function _buildSchema(Schema \$schema)
    {
        return \$schema;
    }

    /**
     * Form validation builder
     *
     * @param \\Cake\\Validation\\Validator \$validator to use against the form
     * @return \\Cake\\Validation\\Validator
     */
    protected function _buildValidator(Validator \$validator)
    {
        return \$validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array \$data Form data.
     * @return bool
     */
    protected function _execute(array \$data)
    {
        return true;
    }
}
", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Form/form.twig", "/opt/lampp/htdocs/my_app_name/vendor/cakephp/bake/src/Template/Bake/Form/form.twig");
    }
}
