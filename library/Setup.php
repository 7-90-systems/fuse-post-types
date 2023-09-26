<?php
    /**
     *  @package fuse-post-types
     *
     *  This is our set up class.
     */
    
    namespace Fuse\Plugin\CPT;
    
    use Fuse\Traits\Singleton;
    
    
    class Setup {
        
        use Singleton;
        
        
        
        
        /**
         *  Initialise our class.
         */
        protected function _init () {
            // Set up the post types!
            $posttype_post_types = new PostType\PostType ();
        } // _init ()
        
    } // class Setup