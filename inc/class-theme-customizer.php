<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

class ThemeCustomizer {

    use SingletonTrait;

    public function __construct() {

        add_action('customize_register', [$this, 'register_customizer_settings']);

    }

    // Register Customizer Settings, Sections, and Controls
    public function register_customizer_settings($wp_customize) {

        // Add a Panel
        $wp_customize->add_panel('theme_settings_panel', [
            'title'       => __('Theme Settings', 'your-theme'),
            'description' => __('Customize the theme appearance and functionality.', 'your-theme'),
            'priority'    => 10,
        ]);
        

        // Add a Section under the Panel
        $wp_customize->add_section('general_settings_section', [
            'title'    => __('General Settings', 'your-theme'),
            'priority' => 20,
            'panel'    => 'theme_settings_panel', // Assign to the Panel
        ]);

        // Add Another Section under the Panel
        $wp_customize->add_section('footer_settings_section', [
            'title'    => __('Footer Settings', 'your-theme'),
            'priority' => 30,
            'panel'    => 'theme_settings_panel', // Assign to the Panel
        ]);

        // Add a Setting and Control to General Settings Section
        $wp_customize->add_setting('custom_logo', [
            'default'           => '',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo_control', [
            'label'    => __('Custom Logo', 'your-theme'),
            'section'  => 'general_settings_section',
            'settings' => 'custom_logo',
        ]));

        // Add a Setting and Control to Footer Settings Section
        $wp_customize->add_setting('footer_text', [
            'default'           => '',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control('footer_text_control', [
            'label'    => __('Footer Text', 'your-theme'),
            'type'     => 'text',
            'section'  => 'footer_settings_section',
            'settings' => 'footer_text',
        ]);
    }
}
