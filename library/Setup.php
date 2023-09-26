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
            
            // Set up our post types
            add_action ('init', array ($this, 'registerPostTypes'));
        } // _init ()
        
        
        
        
        /**
         *  Register our post types.
         */
        public function registerPostTypes () {
            $post_types = get_posts (array (
                'numberposts' => -1,
                'post_type' => 'fusecpt',
                'orderby' => 'title',
                'order' => 'ASC'
            ));
            
            foreach ($post_types as $type) {
                $slug = get_post_meta ($type->ID, 'fusecpt_type_slug', true);
                $labels = get_post_meta ($type->ID, 'fusecpt_type_labels', true);
                $settings = get_post_meta ($type->ID, 'fusecpt_type_settings', true);
                
                if (strlen ($slug) > 0 && is_array ($labels) && is_array ($settings) && count ($labels) > 0 && count ($settings) > 0) {
                    $settings ['labels'] = $labels;
// \Fuse\Debug::dump ($settings, 'Settings', true);
                    
                    $result = register_post_type ($slug, $settings);
// \Fuse\Debug::dump ($result, 'Post type', true);
                } // if ()
            } // foreach ()
        } // registerPostTypes ()
        
    } // class Setup