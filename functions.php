<?php
// Load theme classes (Singleton)
require_once get_template_directory() . '/inc/class-theme-setup.php';
require_once get_template_directory() . '/inc/class-assets.php';
require_once get_template_directory() . '/inc/class-menu.php';
require_once get_template_directory() . '/inc/class-custom-post-types.php';
require_once get_template_directory() . '/inc/class-widgets.php';
require_once get_template_directory() . '/inc/class-shortcodes.php';
require_once get_template_directory() . '/inc/class-theme-option.php';
require_once get_template_directory() . '/inc/class-theme-customizer.php';
require_once get_template_directory() . '/inc/class-cmb2integration.php';
require_once get_template_directory() . '/inc/class-redux-theme-option.php';

// Initialize theme setup (Singleton instance)
Theme_Setup::get_instance();

// Initialize assets (Singleton instance)
Assets::get_instance();

// Initialize menu (Singleton instance)
Theme_Menu::get_instance();

// Initialize custom post types (Singleton instance)
Custom_Post_Types::get_instance();

//initialize Widgets (Singleton instance)
Widgets::get_instance();

//initialize shortcodes (Singleton instance)
Shortcodes::get_instance();

//Admin Menu page as theme option
ThemeOptions::get_instance();

//theme customizer
ThemeCustomizer::get_instance();

// Initialize CMB2 Integration
CMB2Integration::get_instance();

// Initialize CMB2 Integration
ReduxThemeOptions::get_instance();