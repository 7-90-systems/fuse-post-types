<?php
    /**
     *  @package fuse-post-types
     *
     *  This class sets up our Custom Post Types post type. This builds our custom post types!
     */
    
    namespace Fuse\Plugin\CPT\PostType;
    
    
    class PostType extends \Fuse\PostType {
        
        /**
         *  @var array The list of labels.
         */
        protected $_labels;
        
        /**
         *  @var array The list of settings
         */
        protected $_settings;
        
        
        
        
        /**
         *  Object constructor.
         */
        public function __construct () {
            parent::__construct ('fusecpt', __ ('Custom Post Type', 'fuse'), __ ('Custom Post Types', 'fuse'), array (
                'public' => false,
                'publicly_queryable' => false,
                'show_in_rest' => false,
                'show_in_menu' => 'fusesettings',
                'supports' => array (
                    'title'
                )
            ));
            
            $this->_settings = array (
                'description' => array (
                    'label'=> __ ('Description', 'fusecpt'),
                    'type' => 'text'
                ),
                'public' => array (
                    'label'=> __ ('Public', 'fusecpt'),
                    'type' => 'bool',
                    'default' => 'true'
                ),
                'publicly_queryable' => array (
                    'label'=> __ ('Publicly queryable', 'fusecpt'),
                    'type' => 'bool_inherit',
                    'default' => 'true'
                ),
                'exclude_from_search' => array (
                    'label'=> __ ('Exclude from search', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'hierarchical' => array (
                    'label'=> __ ('Hierarchical', 'fusecpt'),
                    'type' => 'bool',
                    'default' => 'false'
                ),
                'has_archive' => array (
                    'label'=> __ ('Has archive pages', 'fusecpt'),
                    'type' => 'bool'
                ),
                'rewrite' => array (
                    'label'=> __ ('Rewrite', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'supports' => array (
                    'label'=> __ ('Supports', 'fusecpt'),
                    'type' => 'textarea',
                    'default' => 'title'.PHP_EOL.'editor'
                ),
                'show_ui' => array (
                    'label'=> __ ('Show admin UI', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'show_in_menu' => array (
                    'label'=> __ ('Show in menu', 'fusecpt'),
                    'type' => 'text'
                ),
                'show_in_nav_menus' => array (
                    'label'=> __ ('Show in navigation menus', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'menu_position' => array (
                    'label'=> __ ('Menu position', 'fusecpt'),
                    'type' => 'number'
                ),
                'menu_icon' => array (
                    'label'=> __ ('Menu icon', 'fusecpt'),
                    'type' => 'text'
                ),
                'show_in_admin_bar' => array (
                    'label'=> __ ('Show in admin bar', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'show_in_rest' => array (
                    'label'=> __ ('Show in REST API', 'fusecpt'),
                    'type' => 'bool',
                    'default' => 'false'
                ),
                'rest_base' => array (
                    'label'=> __ ('REST API base', 'fusecpt'),
                    'type' => 'text'
                ),
                'rest_namespace' => array (
                    'label'=> __ ('REST API namespace', 'fusecpt'),
                    'type' => 'text'
                ),
                'rest_controller_class' => array (
                    'label'=> __ ('REST API controller class', 'fusecpt'),
                    'type' => ''
                ),
                'taxonomies' => array (
                    'label'=> __ ('Taxonomies', 'fusecpt'),
                    'type' => 'textarea'
                ),
                'capability_type' => array (
                    'label'=> __ ('Capability type', 'fusecpt'),
                    'type' => ''
                ),
                'capabilities' => array (
                    'label'=> __ ('Capabilities', 'fusecpt'),
                    'type' => 'textarea'
                ),
                'map_meta_cap' => array (
                    'label'=> __ ('Use internal meta capability handling', 'fusecpt'),
                    'type' => 'bool'
                ),
                'register_meta_box_cb' => array (
                    'label'=> __ ('Register meta box callback', 'fusecpt'),
                    'type' => 'text'
                ),
                'query_var' => array (
                    'label'=> __ ('Query var', 'fusecpt'),
                    'type' => 'text'
                ),
                'can_export' => array (
                    'label'=> __ ('Can export', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'delete_with_user' => array (
                    'label'=> __ ('Delete with user', 'fusecpt'),
                    'type' => 'bool_inherit'
                ),
                'template' => array (
                    'label'=> __ ('Template', 'fusecpt'),
                    'type' => 'textarea'
                ),
                'template_lock' => array (
                    'label'=> __ ('Template lock', 'fusecpt'),
                    'type' => 'bool_inherit'
                )
            );
            
            $this->_labels = array (
                'standard' => array (
                    'name' => __ ('Plural name', 'fusecpt'),
                    'singular_name' => __ ('Singular name', 'fusecpt')
                ),
                'advanced' => array (
                    'add_new' => __ ('Add New', 'fusecpt'),
                    'add_new_item' => __ ('Add New Post/Page', 'fusecpt'),
                    'edit_item' => __ ('Edit Post/Page', 'fusecpt'),
                    'new_item' => __ ('New Post/Page', 'fusecpt'),
                    'view_item' => __ ('View Post/Page', 'fusecpt'),
                    'view_items' => __ ('View Posts/Pages', 'fusecpt'),
                    'search_items' => __ ('Search Posts/Pages', 'fusecpt'),
                    'not_found' => __ ('No posts/pages found', 'fusecpt'),
                    'not_found_in_trash' => __ ('No posts/pages found in trash', 'fusecpt'),
                    'parent_item_colon' => __ ('Parent Page', 'fusecpt'),
                    'all_items' => __ ('All Posts/Pages', 'fusecpt'),
                    'archives' => __ ('Post/Page Archives', 'fusecpt'),
                    'attributes' => __ ('Post/Page Attributes', 'fusecpt'),
                    'insert_into_item' => __ ('Insert into post/page', 'fusecpt'),
                    'uploaded_to_this_item' => __ ('Uplaoded to this post/page', 'fusecpt'),
                    'featured_image' => __ ('Featured image', 'fusecpt'),
                    'set_featured_image' => __ ('Set featured image', 'fusecpt'),
                    'remove_featured_image' => __ ('Remove featured image', 'fusecpt'),
                    'use_featured_image' => __ ('Use as featured image', 'fusecpt'),
                    'menu_name' => __ ('Menu Name', 'fusecpt'),
                    'filter_items_list' => __ ('Filter posts/pages list', 'fusecpt'),
                    'filter_by_date' => __ ('Filter by date', 'fusecpt'),
                    'items_list_navigation' => __ ('Posts/Pages list navigation', 'fusecpt'),
                    'items_list' => __ ('Posts/Pages list', 'fusecpt'),
                    'item_published' => __ ('Post/Page published', 'fusecpt'),
                    'item_published_privately' => __ ('Private label', 'fusecpt'),
                    'item_reverted_to_draft' => __ ('Post/Page reverted to draft', 'fusecpt'),
                    'item_trashed' => __ ('Post/Page trashed', 'fusecpt'),
                    'item_scheduled' => __ ('PostPage scheduled', 'fusecpt'),
                    'item_updated' => __ ('Post/Page updated', 'fusecpt'),
                    'item_link' => __ ('Post/Page link', 'fusecpt'),
                    'item_link_description' => __ ('A link to a post/page', 'fusecpt')
                )
            );
        } // __construct ()
        
        
        
        
        /**
         *  Set up our meta boxes.
         */
        public function addMetaBoxes () {
            add_meta_box ('fusecpt_type_slg', __ ('Post Type Slug', 'fusecpt'), array ($this, 'slugMeta'), $this->getSlug (), 'normal', 'default');
            add_meta_box ('fuse_cpt_type_labels_meta', __ ('Labels', 'fusecpt'), array ($this, 'labelsMeta'), $this->getSlug (), 'normal', 'default');
            add_meta_box ('fuse_cpt_type_settings_meta', __ ('Settings', 'fusecpt'), array ($this, 'settingsMeta'), $this->getSlug (), 'normal', 'default');
        } // addMetaBoxes ()
        
        /**
         *  Set up the slug meta box.
         */
        public function slugMeta ($post) {
            $slug = get_post_meta ($post->ID, 'fusecpt_type_slug', true);
            ?>
                <table class="form-table">
                    <tr>
                        <th><?php _e ('Post type slug', 'fusecpt'); ?></th>
                        <td>
                            <?php if (empty ($slug) === true): ?>
                            
                                <input typ="text" name="fusecpt_type_slug" value="<?php esc_attr_e ($slug); ?>" class="regular-text" />
                                <p class="description"><?php _e ('Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.', 'fusecpt'); ?></p>
                            
                            <?php else: ?>
                            
                                <strong><?php echo $slug; ?></strong>
                            
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                </table>
            <?php
        } // slugMeta ()
        
        /**
         *  Set up the labels meta box.
         */
        public function labelsMeta ($post) {
            $use_advanced = false;
            $standard_label = __ ('Show advanced labels', 'fusecpt');
            $advanced_label = __ ('Hide advanced labels', 'fusecpt');
            
            if (get_post_meta ($post->ID, 'fusecpt_type_labels_advanced', true) == 'advanced') {
                $use_advanced = true;
            } // if ()
            
            $labels = get_post_meta ($post->ID, 'fusecpt_type_labels', true);
            
            if (is_array ($labels) === false) {
                $labels = array ();
            } // if ()
            
            $label_types = $this->_labels;
            ?>
                <table class="form-table">
                    
                    <?php foreach ($label_types as $type_key => $types): ?>
                    
                        <?php foreach ($types as $key => $label): ?>
                            <?php
                                $value = '';
                                
                                if (array_key_exists ($key, $labels)) {
                                    $value = $labels [$key];
                                } // if ()
                            ?>
                        
                            <tr class="fusecpt-label-row-<?php echo $type_key; ?>"<?php if ($type_key == 'advanced' && $use_advanced !== true) echo ' style="display: none;"'; ?>>
                                <th><?php echo $label; ?></th>
                                <td>
                                    <input type="text" name="fusecpt_type_labels[<?php echo $key; ?>]" value="<?php esc_attr_e ($value); ?>" class="regular-text" />
                                </td>
                            </tr>
                        
                        <?php endforeach; ?>
                    
                    <?php endforeach; ?>
                    
                </table>
                
                <p>
                    <a href="#" id="fusecpt-labels-advanced-button" class="button<?php if ($use_advanced) echo ' advanced'; ?>">
                        <?php
                            if ($use_advanced === true) {
                                echo $advanced_label;
                            } // if ()
                            else {
                                echo $standard_label;
                            } // else
                        ?>
                    </a>
                </p>
                
                <p><?php printf (__ ('For more information, check out the documentation for the %s function.', 'fusecpt'), '<a href="'.esc_url ('https://developer.wordpress.org/reference/functions/get_post_type_labels/').'" target="_blank">get_post_type_labels()</a>'); ?></p>
            
                <input type="hidden" id="fusecpt_type_labels_advanced" name="fusecpt_type_labels_advanced" value="<?php echo $use_advanced ? 'advanced' : 'standard'; ?>" />
            
                <script type="text/javascript">
                    jQuery (document).ready (function () {
                        jQuery ('#fusecpt-labels-advanced-button').click (function (e) {
                            e.preventDefault ();
                            
                            var btn = jQuery (this);
                            
                            if (btn.hasClass ('advanced')) {
                                btn.removeClass ('advanced').text ('<?php echo $standard_label ?>');
                                jQuery ('.fusecpt-label-row-advanced').hide ();
                                jQuery ('#fusecpt_type_labels_advanced').val ('standard');
                            } // if ()
                            else {
                                btn.addClass ('advanced').text ('<?php echo $advanced_label ?>');
                                jQuery ('.fusecpt-label-row-advanced').show ();
                                jQuery ('#fusecpt_type_labels_advanced').val ('advanced');
                            } // else
                        });
                    });
                </script>
            <?php
        } // labelsMeta ()
        
        /**
         *  Set up the settings meta box.
         */
        public function settingsMeta ($post) {
            $settings = get_post_meta ($post->ID, 'fusecpt_type_settings', true);
            
            if (is_array ($settings) === false) {
                $settings = array ();
            } // if ()
            
            $settings_list = $this->_settings;
            ?>
                <table class="form-table">
                    
                    <?php foreach ($settings_list as $key => $setting): ?>
                    
                        <tr>
                            <th><?php echo $setting ['label']; ?></th>
                            <td>
                                <?php
                                    $value = '';
                                    
                                    if (array_key_exists ($key, $settings)) {
                                        $value = $settings [$key];
                                    } // if ()
                                    elseif (empty ($value) && array_key_exists ('default', $setting)) {
                                        $value = $setting ['default'];
                                    } // elseif ()
                                    
                                    switch ($setting ['type']) {
                                        case 'bool':
                                            $this->_boolField ($key, $value);
                                            break;
                                        case 'bool_inherit':
                                            $this->_boolInheritField ($key, $value);
                                            break;
                                        case 'number':
                                            $this->_numberField ($key, $value);
                                            break;
                                        case 'textarea':
                                            $this->_textareaField ($key, $value);
                                            break;
                                        default:
                                            $this->_textField ($key, $value);
                                    } // switch ()
                                ?>
                            </td>
                        </tr>
                    
                    <?php endforeach; ?>
                
                </table>
            <?php
        } // settingsMeta ()
        
        
        
        
        /**
         *  Save our posts values.
         */
        public function savePost ($post_id, $post) {
            // Slug
            if (array_key_exists ('fusecpt_type_slug', $_POST)) {
                update_post_meta ($post_id, 'fusecpt_type_slug', strtolower ($_POST ['fusecpt_type_slug']));
            } // if ()
            
            // Labels
            if (array_key_exists ('fusecpt_type_labels', $_POST)) {
                $labels = $_POST ['fusecpt_type_labels'];
                $labels = array_filter ($labels);
                
                update_post_meta ($post_id, 'fusecpt_type_labels', $labels);
                update_post_meta ($post_id, 'fusecpt_type_labels_advanced', $_POST ['fusecpt_type_labels_advanced']);
            } // if ()
            
            // Settings
            if (array_key_exists ('fusecpt_type_settings', $_POST)) {
                $settings = $_POST ['fusecpt_type_settings'];
                $settings = array_filter ($settings);
                
                foreach ($this->_settings as $key => $setting) {
                    switch ($setting ['type']) {
                        case 'textarea':
                            $settings [$key] = explode (PHP_EOL, $settings [$key]);
                            break;
                        case 'bool':
                            $settings [$key] = $settings [$key] = 'true' ? true : false;
                            break;
                        case 'bool_inherit':
                            if (strlen ($settings [$key]) > 0) {
                                $settings [$key] = $settings [$key] = 'true' ? true : false;
                            } // if ()
                    } // switch ()
                } // foreach ()
                
                update_post_meta ($post_id, 'fusecpt_type_settings', $settings);
            } // if ()
        } // savePost ()
        
        
        
        
        /**
         *  Set up a BOOLEAN form field.
         */
        protected function _boolField ($key, $value) {
            ?>
                <select name="fusecpt_type_settings[<?php echo $key; ?>]">
                    <option value="false"<?php selected ($value, false); ?>><?php _e ('False', 'fusecpt'); ?></option>
                    <option value="true"<?php selected ($value, true); ?>><?php _e ('True', 'fusecpt'); ?></option>
                </select>
            <?php
        } // _boolField ()
        
        /**
         *  Set up a BOOLEAN INHERIT form field.
         */
        protected function _boolInheritField ($key, $value) {

            ?>
                <select name="fusecpt_type_settings[<?php echo $key; ?>]">
                    <option value=""<?php selected ($value, ''); ?>><?php _e ('Inherit from default value', 'fusecpt'); ?></option>
                    <option value="false"<?php selected ($value, false); ?>><?php _e ('False', 'fusecpt'); ?></option>
                    <option value="true"<?php selected ($value, true); ?>><?php _e ('True', 'fusecpt'); ?></option>
                </select>
            <?php
        } // _boolInheritField ()
        
        /**
         *  Output a NUMBER field.
         */
        protected function _numberField ($key, $value) {
            ?>
                <input type="number" name="fusecpt_type_settings[<?php echo $key; ?>]" value="<?php esc_attr_e ($value); ?>" class="regular-text" />
            <?php
        } // _numberField ()
        
        /**
         *  Output a text area field.
         */
        protected function _textareaField ($key, $value) {
            if (is_array ($value)) {
                $value = implode (PHP_EOL, $value);
            } // if ()
            ?>
                <textarea name="fusecpt_type_settings[<?php echo $key; ?>]" class="regular-text" rows="5"><?php echo stripslashes ($value); ?></textarea>
            <?php
        } // _textareaField ()
        
        /**
         *  Output a TEXT field.
         */
        protected function _textField ($key, $value) {
            ?>
                <input type="text" name="fusecpt_type_settings[<?php echo $key; ?>]" value="<?php esc_attr_e ($value); ?>" class="regular-text" />
            <?php
        } // _textField ()
        
    } // class PostType