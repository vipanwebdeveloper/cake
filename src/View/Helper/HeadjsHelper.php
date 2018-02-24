<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\View\Html;
use Cake\Routing\Router;

class HeadjsHelper extends Helper
{
    static $js_collector = [];
    static $css_collector = [];
    public $helpers = ['Html'];
    // initialize() hook is available since 3.2. For prior versions you can
    // override the constructor if required.
    public function initialize(array $config)
    {
        $this->Html->script('head.min.js',['block'=> 'common_script']);
    }
    public function addJs($js, $extra=[])
    {
        $block = $extra['block'];
        self::$js_collector[$block] = is_array($js)? array_map(array('Cake\Routing\Router','url'), $js) : [Router::url($js)];
    }
    public function addCss($css, $extra=[])
    {
        $block = $extra['block'];
        self::$css_collector[$block] = is_array($css)? array_map(array('Cake\Routing\Router','url'), $css) : [Router::url($css)];
    }
    public function script($block)
    {
        return $this->_View->element(
            '/common/headjs',
            [ 'scripts'=>self::$js_collector[$block]]
        );
    }
    public function css($block)
    {
        return $this->_View->element(
            '/common/headcss',
            ['css'=>self::$css_collector[$block]]
        );
    }
}