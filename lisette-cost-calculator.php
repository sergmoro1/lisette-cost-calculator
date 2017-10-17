<?php
/*
Plugin Name: Lisette Cost Calculator
Plugin URI: http://lisette.vorst.ru
Description: Сosts calculator works
Author: Sergey Morozov
Author URI: http://vorst.ru
License: MIT
Version: 1.0
Text Domain: lcc
Domain Path: /languages
*/
 
/**
 * Plugin version 1.0
 * 
 * @var string
 */
define('СOST_CALCULATOR_VERSION', '1.0');
 
/**
 * Path to the plugin directory
 * 
 * @var string
 */
define('СOSTCALCULATOR__DOCUMENT_ROOT', dirname(__FILE__));

require_once 'LisetteCCApplication.php';
require_once 'Sum.php';

/*
 * Do somethig once, when the plugin is activated.
 */
function cost_calculator_activate() {
}
register_activation_hook(__FILE__, 'cost_calculator_activate');

try {
    $application = new LisetteCCApplication(['name' => 'questionnaire-test']);
} catch (Exception $e) {
    echo $e->getMessage();
}
