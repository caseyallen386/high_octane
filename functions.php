<?php
/**
*
* Theme Name: High_Octane
* Description: Genesis Child Theme built to enhance SEO ratings and site curb appeal. High_Octane is the ultimate streamlined customizable WordPress Theme.
* Author: Performance Driven Marketing & Zach Manning
* Author URI: http://www.performancedrivenmarketing.com
* License: GPL-2.0+ License URI: http://www.gnu.org/licenses/gpl-2.0.html
*
* Template: Genesis
*
**/

global $high_octane;

require_once( dirname( __FILE__) . '/octane-core/layout.php' );
require_once( dirname( __FILE__) . '/octane-core/octane.php' );
require_once( dirname( __FILE__ ) .'/octane-core/custom_functions.php');

$high_octane = new High_Octane();

$high_octane->init();
