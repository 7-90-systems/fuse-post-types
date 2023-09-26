<?php
    /**
     *  Plugin Name: Fuse Custom Post Types
     *  Description: Add custom post types to your website quickly and easily.
     *  Version: 
     *  Author: 
     *  Author URI: 
     *  License: 
     *  Text Domain: fusecpt
     */
    
    namespace Fuse\Plugin\CPT;
    
    
    define ('FUSE_PLUGIN_CPT_BASE_URI', __DIR__);
    define ('FUSE_PLUGIN_CPT_BASE_URL', plugins_url ('', __FILE__));
    
    
    $fuse_plugin_cpt_setup = Setup::getInstance ();