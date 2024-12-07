<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

class Theme_Setup {

    use SingletonTrait;

    public function __construct() {

        add_action('after_setup_theme', array($this, 'theme_supports'));
        add_action('wp_enqueue_scripts', array($this, 'theme_assets'));

    }

    public function theme_supports() {

        add_theme_support( 'title-tag' );
        add_theme_support('site-icon');

        add_theme_support('custom-logo', array(
            'height'        => 100,
            'width'         => 300,
            'flex-height'          => true,
            'flex-width'           => true,
            'default'               => get_template_directory().'assets/images/logo.png'
        ));

        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('widgets');
        add_theme_support( 'wp-block-styles' );
        remove_theme_support( 'widgets-block-editor' );

    }

    public function theme_assets() {

        wp_enqueue_style('theme-style', get_stylesheet_uri());

    }
}

