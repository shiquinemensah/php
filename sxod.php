<?php

/**
 * @package sxodPlugin 
 */
/*
Plugin Name: sxod Plugin 
Plugin URI: http://sxod.com/plugin
Description: this is my first attempt on writing a plugin.
Version: 1.0.0
Author: SXOD 
Author URI: sxod.com
License: GPLv2 or Later
text Domain: sxod Plugin 
*/



if(! defined('ABSPATH')) {
    exit;
   
}

class SxodPlugin
{
    //public

    //Protect

    //Private

    function __construct()
    {
        add_action( 'init', array( $this,'custom_post_type'));
    }
    

    function activate(){
        // generate CPT
        $this->custom_post_type();
        // Flush rewrite rules 
        flush_rewrite_rules();
    }

    function deactivate(){
        //flush rewrite rules
        flush_rewrite_rules();
    }

    // function uninstall(){
    //     //delete CPT
    //     // delete all the plugin data from the DB 
    // }

    function custom_post_type()
    {
        register_post_type ('book', ['public' => true, 'lable' => 'Books'] );  
    }

    function register() //you have control on the type of scripts your able to create
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue(){
        // enquee all our scripts 
        wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__ ), array(''));
        wp_enqueue_script( 'mypluginstyle', plugins_url('/assets/myscript.js', __FILE__ ), array(''));
    }
     

}


if (class_exists('SxodPlugin')){
    $sxodPlugin = new SxodPlugin();
    $SxodPlugin->register();

}


//Activation
register_activation_hook( __FILE__, array( $sxodPlugin, 'activate') );

//Deactivation
register_deactivation_hook( __FILE__, array( $sxodPlugin, 'deactivate') );

//Uninstall 
register_uninstall_hook( __FILE__, array( $sxodPlugin, 'deactivate') ); 
