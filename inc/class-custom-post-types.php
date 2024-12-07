<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

class Custom_Post_Types {

    use SingletonTrait;

    public function __construct() {

        add_action('init', array($this, 'create_custom_post_types'));
    }

    public function create_custom_post_types() {

        register_post_type('portfolio', array(
            'labels' => array(
                'name' => 'Portfolios',
                'singular_name' => 'Portfolio',
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        ));
        
    }
}

