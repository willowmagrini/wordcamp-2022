<?php
/**
 * Plugin Name:       php-info
 * Description:       Plugin que imprime o phpinfo quando você utiliza o parametro GET phpinfo=true
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Author:            willow
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ExamplePlugin {
    public function __construct() {
        add_action( 'admin_head', array($this,'callPhpinfo'));   
	}
    public function callPhpinfo(){
        if(isset($_GET['phpinfo']) && $_GET['phpinfo'] == 'true' ){
            add_action( 'admin_head', array($this,'do_table_to_cpt' ));   
            phpinfo();
            die;
        }
        
    }
}

if ( is_admin() ) $instance = new ExamplePlugin();


