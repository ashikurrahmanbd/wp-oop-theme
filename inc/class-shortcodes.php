<?php

// Include the SingletonTrait to use it
require_once get_template_directory() . '/inc/trait-singleton.php';
class Shortcodes {

    use SingletonTrait;

    public function __construct() {

        add_action('init', [$this, 'register_shortcodes']);

    }

    public function register_shortcodes() {

        add_shortcode('button', [$this, 'button_shortcode']);

        add_shortcode('info_box', [$this, 'info_box_shortcode']);

    }

    // Example Shortcode: [button text="Click Me" link="https://example.com"]
    public function button_shortcode($atts) {

        $atts = shortcode_atts([
            'text' => 'Learn More',
            'link' => '#',
        ], $atts, 'button');

        return sprintf(
            '<a href="%s" class="custom-button">%s</a>',
            esc_url($atts['link']),
            esc_html($atts['text'])
        );

    }

    // Example Shortcode: [info_box title="Info Title" content="This is the info box content."]
    public function info_box_shortcode($atts, $content = null) {

        $atts = shortcode_atts([
            'title' => 'Default Title',
        ], $atts, 'info_box');

        $content = $content ?: 'Default content.';

        return sprintf(
            '<div class="info-box">
                <h3 class="info-box-title">%s</h3>
                <div class="info-box-content">%s</div>
            </div>',
            esc_html($atts['title']),
            wp_kses_post($content)
        );

    }
}
