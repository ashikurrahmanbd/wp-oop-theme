<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';

class ThemeOptions {
    
    use SingletonTrait;

    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_menu_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Add the Theme Options Page
    public function add_admin_menu_page() {
        add_menu_page(
            __('Theme Options', 'your-theme'), // Page title
            __('Theme Options', 'your-theme'), // Menu title
            'manage_options',                 // Capability
            'theme-options',                  // Menu slug
            [$this, 'render_menu_page'],      // Callback function
            'dashicons-admin-generic',        // Icon
            20                                // Position
        );
    }

    // Render the Admin Page Content
    public function render_menu_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html__('Theme Options', 'your-theme'); ?></h1>
            <form action="options.php" method="POST">
                <?php
                settings_fields('theme_options_group'); // Match the group name in `register_settings`
                do_settings_sections('theme-options');  // Match the slug in `add_settings_section`
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register Settings and Sections
    public function register_settings() {
        // Register Setting
        register_setting('theme_options_group', 'theme_options'); // Group name and option name

        // Add Section
        add_settings_section(
            'theme_options_section',               // Section ID
            __('General Settings', 'your-theme'), // Title
            null,                                 // Callback (can leave null)
            'theme-options'                       // Page slug
        );

        // Add Field
        add_settings_field(
            'custom_logo',                        // Field ID
            __('Custom Logo', 'your-theme'),      // Label
            [$this, 'custom_logo_callback'],      // Callback function
            'theme-options',                      // Page slug
            'theme_options_section'               // Section ID
        );
    }

    // Callback for the Custom Logo Field
    public function custom_logo_callback() {
        $options = get_option('theme_options');
        $custom_logo = isset($options['custom_logo']) ? $options['custom_logo'] : '';
        ?>
        <input type="text" id="custom_logo" name="theme_options[custom_logo]" value="<?php echo esc_attr($custom_logo); ?>" />
        <p class="description"><?php echo esc_html__('Enter the URL of your custom logo.', 'your-theme'); ?></p>
        <?php
    }
}
