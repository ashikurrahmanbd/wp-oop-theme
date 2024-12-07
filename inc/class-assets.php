<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

class Assets {

    use SingletonTrait;

    public function __construct() {}

    public function enqueue_styles() {

        //root stylesheet
        wp_enqueue_style('theme-root-style', get_stylesheet_uri());

    }

    public function enqueue_scripts() {

        wp_enqueue_script('theme-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), filemtime(__FILE__), true);

    }

}

