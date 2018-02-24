<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadHelper('Headjs');
        $this->loadHelper('Form', [
            'className' => 'MyForm'
        ]);
        $this->Html->css([
            'https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext',
            'https://fonts.googleapis.com/icon?family=Material+Icons',
        ],['block'=>'css']);
/*            '/js/pages/index.js',
            '/plugins/jquery-slimscroll/jquery.slimscroll.js',
            '/js/demo.js'
*/
        $this->HeadJs->addJs([
            '/plugins/jquery/jquery.min.js',
            '/plugins/bootstrap/js/bootstrap.js',
            '/plugins/bootstrap-select/js/bootstrap-select.js',
            '/plugins/node-waves/waves.js',
            '/plugins/jquery-countto/jquery.countTo.js',
            '/plugins/raphael/raphael.min.js',
            '/js/admin.js',
        ], array('block' => 'main_script'));
        // sparkline-js
        $this->HeadJs->addJs([
            '/plugins/jquery-sparkline/jquery.sparkline.js',
        ], array('block' => 'sparkline-js'));

        // flot-chart
        $this->HeadJs->addJs([
            '/plugins/flot-charts/jquery.flot.js',
            '/plugins/flot-charts/jquery.flot.resize.js',
            '/plugins/flot-charts/jquery.flot.pie.js',
            '/plugins/morrisjs/morris.js',
            '/plugins/chartjs/Chart.bundle.js',
            '/plugins/jquery-sparkline/jquery.sparkline.js',
            '/plugins/flot-charts/jquery.flot.categories.js',
            '/plugins/flot-charts/jquery.flot.time.js',
        ], array('block' => 'flot-chart-js'));

        $this->HeadJs->addCss(
            [
                '/plugins/bootstrap/css/bootstrap.css',
                '/plugins/node-waves/waves.css',
                '/plugins/animate-css/animate.css',
                '/plugins/morrisjs/morris.css',
                '/css/style.css',
                '/css/themes/all-themes.css'
            ], [
                'block'=> 'css'
            ]
        );
    }
}
