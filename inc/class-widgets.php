<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';
class Widgets {
    
    use SingletonTrait;

    public function __construct() {
        add_action('widgets_init', [$this, 'register_footer_widgets']);
    }

    public function register_footer_widgets() {
        // Register Footer Widget Area
        register_sidebar([
            'name'          => __('Footer Widget Area 1', 'your-theme'),
            'id'            => 'footer-1',
            'description'   => __('Widgets in this area will be shown in the first footer column.', 'your-theme'),
            'before_widget' => '<div class="footer-widget footer-widget-1">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ]);

        register_sidebar([
            'name'          => __('Footer Widget Area 2', 'your-theme'),
            'id'            => 'footer-2',
            'description'   => __('Widgets in this area will be shown in the second footer column.', 'your-theme'),
            'before_widget' => '<div class="footer-widget footer-widget-2">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ]);
    }
}
