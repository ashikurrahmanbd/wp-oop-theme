<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

// Include Redux Framework
require_once get_template_directory() . '/inc/lib/redux/redux-core/framework.php';

class ReduxThemeOptions {

    use SingletonTrait;

    private $opt_name = 'your_theme_options';

    public function __construct() {
        if (!class_exists('Redux')) {
            return; // Ensure Redux Framework is loaded
        }

        add_action('redux/init', [$this, 'register_options']);
    }

    public function register_options() {
        $args = [
            'opt_name'            => $this->opt_name,
            'menu_title'          => __('Theme Options', 'your-theme'),
            'page_title'          => __('Theme Options', 'your-theme'),
            'menu_type'           => 'menu',
            'menu_slug'           => 'theme-options',
            'admin_bar'           => true,
            'allow_sub_menu'      => true,
            'customizer'          => true,
            'page_priority'       => null,
            'page_parent'         => 'themes.php',
            'page_permissions'    => 'manage_options',
            'dev_mode'            => false,
            'update_notice'       => true,
            'intro_text'          => __('Welcome to your theme options!', 'your-theme'),
        ];

        // Initialize Redux
        Redux::setArgs($this->opt_name, $args);

        // Add sections and fields
        Redux::setSection($this->opt_name, [
            'title'  => __('General Settings', 'your-theme'),
            'id'     => 'general',
            'desc'   => __('Basic theme settings.', 'your-theme'),
            'fields' => [
                [
                    'id'       => 'site_logo',
                    'type'     => 'media',
                    'title'    => __('Site Logo', 'your-theme'),
                    'desc'     => __('Upload your site logo here.', 'your-theme'),
                ],
                [
                    'id'       => 'primary_color',
                    'type'     => 'color',
                    'title'    => __('Primary Color', 'your-theme'),
                    'default'  => '#3498db',
                ],
            ],
        ]);

        Redux::setSection($this->opt_name, [
            'title'  => __('Footer Settings', 'your-theme'),
            'id'     => 'footer',
            'fields' => [
                [
                    'id'       => 'footer_text',
                    'type'     => 'text',
                    'title'    => __('Footer Text', 'your-theme'),
                    'default'  => __('Copyright © 2024 Your Theme', 'your-theme'),
                ],
            ],
        ]);
    }
}
