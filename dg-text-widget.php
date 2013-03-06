<?php
/*
Plugin Name: Dg text widget
Description: Widget to display text to the users.
Version: 1.0
Author: Ross Tweedie
Author URI: http://www.dachisgroup.com/
*/

include_once( ABSPATH . WPINC . '/default-widgets.php' );


add_action( 'widgets_init', create_function( '', 'return register_widget( "DgTextWidget" );' ) );


class DgTextWidget extends WP_Widget_Text
{

	function __construct() {
		$widget_ops = array('classname' => 'widget_dg_text', 'description' => __('Arbitrary text or HTML'));
		$control_ops = array('width' => 400, 'height' => 350);
		WP_Widget::__construct('dg_text', __('DG Text'), $widget_ops, $control_ops);

        if ( ! is_admin() ){
            /**
            * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
            */
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts') );
        }

	}


    /**
     * Enqueue plugin scripts and stylesheets
     */
    function enqueue_scripts() {

        wp_register_style( 'dg-text-css', plugins_url('css/dg-text.css', __FILE__), null, '1', 'all' );
        wp_enqueue_style( 'dg-text-css' );
    }


}
