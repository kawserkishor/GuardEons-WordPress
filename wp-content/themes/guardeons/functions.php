<?php
/**
 * GuardEons Theme functions and definitions
 *
 * @package guardeons
 */

if (!defined('GUARDEONS_VERSION')) {
    $theme = wp_get_theme();
    define('GUARDEONS_VERSION', $theme->get('Version'));
}

/**
 * Theme setup
 */
function guardeons_setup() {
    load_theme_textdomain('guardeons', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => __('Primary Menu', 'guardeons'),
        'footer'  => __('Footer Menu', 'guardeons'),
        'social'  => __('Social Links Menu', 'guardeons'),
    ]);

    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/main.css');

    add_image_size('case-study-thumb', 600, 400, true);
    add_image_size('team-headshot', 400, 400, true);
}
add_action('after_setup_theme', 'guardeons_setup');

/**
 * Register widget areas
 */
function guardeons_widgets_init() {
    $shared_args = [
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ];

    register_sidebar(array_merge($shared_args, [
        'name'        => __('Header Top', 'guardeons'),
        'id'          => 'header-top',
        'description' => __('Widgets in the top header area.', 'guardeons'),
    ]));

    register_sidebar(array_merge($shared_args, [
        'name'        => __('Sidebar', 'guardeons'),
        'id'          => 'sidebar-1',
        'description' => __('Main sidebar.', 'guardeons'),
    ]));

    register_sidebar(array_merge($shared_args, [
        'name'        => __('Footer 1', 'guardeons'),
        'id'          => 'footer-1',
        'description' => __('First footer widget area.', 'guardeons'),
    ]));

    register_sidebar(array_merge($shared_args, [
        'name'        => __('Footer 2', 'guardeons'),
        'id'          => 'footer-2',
        'description' => __('Second footer widget area.', 'guardeons'),
    ]));

    register_sidebar(array_merge($shared_args, [
        'name'        => __('Footer 3', 'guardeons'),
        'id'          => 'footer-3',
        'description' => __('Third footer widget area.', 'guardeons'),
    ]));
}
add_action('widgets_init', 'guardeons_widgets_init');

/**
 * Enqueue scripts and styles
 */
function guardeons_scripts() {
    $theme_uri = get_template_directory_uri();

    // Main stylesheet (keep style.css for theme header; enqueue main.css)
    wp_enqueue_style('guardeons-main', $theme_uri . '/assets/css/main.css', [], GUARDEONS_VERSION);

    // Google Fonts: Inter, Poppins, Montserrat
    wp_enqueue_style('guardeons-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600;700&family=Montserrat:wght@400;600;700&display=swap', [], null);

    // Main JS
    wp_enqueue_script('guardeons-main', $theme_uri . '/assets/js/main.js', [], GUARDEONS_VERSION, true);

    // Localize data
    wp_localize_script('guardeons-main', 'GUARDEONS', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'themeUrl' => $theme_uri,
    ]);
}
add_action('wp_enqueue_scripts', 'guardeons_scripts');

/**
 * Remove emojis for performance
 */
function guardeons_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'guardeons_disable_emojis');

/**
 * Register Custom Post Types
 */
function guardeons_register_cpts() {
    // Services
    register_post_type('service', [
        'label' => __('Services', 'guardeons'),
        'labels' => [
            'name' => __('Services', 'guardeons'),
            'singular_name' => __('Service', 'guardeons'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-shield-alt',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'services'],
        'show_in_rest' => true,
    ]);

    // Case Studies
    register_post_type('case_study', [
        'label' => __('Case Studies', 'guardeons'),
        'labels' => [
            'name' => __('Case Studies', 'guardeons'),
            'singular_name' => __('Case Study', 'guardeons'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'case-studies'],
        'show_in_rest' => true,
    ]);

    // Team Members
    register_post_type('team_member', [
        'label' => __('Team Members', 'guardeons'),
        'labels' => [
            'name' => __('Team', 'guardeons'),
            'singular_name' => __('Team Member', 'guardeons'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'team'],
        'show_in_rest' => true,
    ]);

    // Job Openings
    register_post_type('job_opening', [
        'label' => __('Job Openings', 'guardeons'),
        'labels' => [
            'name' => __('Job Openings', 'guardeons'),
            'singular_name' => __('Job Opening', 'guardeons'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'careers'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'guardeons_register_cpts');

/**
 * Register Taxonomies
 */
function guardeons_register_taxonomies() {
    // Industry for Case Studies
    register_taxonomy('industry', 'case_study', [
        'labels' => [
            'name' => __('Industries', 'guardeons'),
            'singular_name' => __('Industry', 'guardeons'),
        ],
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'industry'],
        'show_in_rest' => true,
    ]);

    // Service Category for Services
    register_taxonomy('service_category', 'service', [
        'labels' => [
            'name' => __('Service Categories', 'guardeons'),
            'singular_name' => __('Service Category', 'guardeons'),
        ],
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'service-category'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'guardeons_register_taxonomies');

/**
 * Customizer settings for colors and typography
 */
function guardeons_customize_register($wp_customize) {
    // Panel
    $wp_customize->add_panel('guardeons_theme_options', [
        'title' => __('GuardEons Theme Options', 'guardeons'),
        'priority' => 10,
    ]);

    // Section: Brand
    $wp_customize->add_section('guardeons_brand', [
        'title' => __('Brand & Colors', 'guardeons'),
        'panel' => 'guardeons_theme_options',
    ]);

    // Colors
    $colors = [
        'primary' => ['#1a365d', __('Primary (Deep Navy)', 'guardeons')],
        'secondary' => ['#2563eb', __('Secondary (Tech Blue)', 'guardeons')],
        'accent' => ['#10b981', __('Accent (Cyber Green)', 'guardeons')],
        'accentAlt' => ['#34d399', __('Accent Alt (Mint)', 'guardeons')],
        'text' => ['#ffffff', __('Text on Dark', 'guardeons')],
        'muted' => ['#f5f5f5', __('Muted Gray)', 'guardeons')],
        'dark' => ['#424242', __('Dark Gray)', 'guardeons')],
    ];

    foreach ($colors as $key => $data) {
        [$default, $label] = $data;
        $setting_id = "guardeons_color_{$key}";
        $wp_customize->add_setting($setting_id, [
            'default' => $default,
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, [
            'label' => $label,
            'section' => 'guardeons_brand',
            'settings' => $setting_id,
        ]));
    }

    // Typography
    $wp_customize->add_section('guardeons_typography', [
        'title' => __('Typography', 'guardeons'),
        'panel' => 'guardeons_theme_options',
    ]);

    $wp_customize->add_setting('guardeons_font_family', [
        'default' => 'Inter, Poppins, Montserrat, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]);

    $wp_customize->add_control('guardeons_font_family', [
        'label' => __('Base Font Stack', 'guardeons'),
        'type' => 'text',
        'section' => 'guardeons_typography',
    ]);

    // Contact CTA
    $wp_customize->add_section('guardeons_contact', [
        'title' => __('Contact & CTA', 'guardeons'),
        'panel' => 'guardeons_theme_options',
    ]);

    $wp_customize->add_setting('guardeons_contact_email', [
        'default' => get_bloginfo('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('guardeons_contact_email', [
        'label' => __('Contact Email', 'guardeons'),
        'type' => 'email',
        'section' => 'guardeons_contact',
    ]);

    $wp_customize->add_setting('guardeons_contact_phone', [
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]);
    $wp_customize->add_control('guardeons_contact_phone', [
        'label' => __('Contact Phone', 'guardeons'),
        'type' => 'text',
        'section' => 'guardeons_contact',
    ]);

    $wp_customize->add_setting('guardeons_emergency_phone', [
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]);
    $wp_customize->add_control('guardeons_emergency_phone', [
        'label' => __('Emergency Phone (24/7)', 'guardeons'),
        'type' => 'text',
        'section' => 'guardeons_contact',
    ]);

    $wp_customize->add_setting('guardeons_map_embed_src', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('guardeons_map_embed_src', [
        'label' => __('Google Maps Embed URL', 'guardeons'),
        'type' => 'url',
        'section' => 'guardeons_contact',
        'description' => __('Paste the Google Maps embed URL (src).', 'guardeons'),
    ]);

    $wp_customize->add_setting('guardeons_client_portal_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('guardeons_client_portal_url', [
        'label' => __('Client Portal URL', 'guardeons'),
        'type' => 'url',
        'section' => 'guardeons_contact',
    ]);
}
add_action('customize_register', 'guardeons_customize_register');

/**
 * Output CSS variables based on Customizer
 */
function guardeons_inline_styles() {
    $vars = [
        '--color-primary' => get_theme_mod('guardeons_color_primary', '#1a237e'),
        '--color-secondary' => get_theme_mod('guardeons_color_secondary', '#283593'),
        '--color-accent' => get_theme_mod('guardeons_color_accent', '#00e676'),
        '--color-accent-alt' => get_theme_mod('guardeons_color_accentAlt', '#1de9b6'),
        '--color-text-on-dark' => get_theme_mod('guardeons_color_text', '#ffffff'),
        '--color-muted' => get_theme_mod('guardeons_color_muted', '#f5f5f5'),
        '--color-dark' => get_theme_mod('guardeons_color_dark', '#424242'),
        '--font-base' => get_theme_mod('guardeons_font_family', 'Inter, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"'),
    ];
    echo '<style id="guardeons-inline-vars">:root{';
    foreach ($vars as $k => $v) {
        echo esc_html($k) . ':' . esc_html($v) . ';';
    }
    echo '}</style>';
}
add_action('wp_head', 'guardeons_inline_styles');

/**
 * Optional: Output live chat snippet in footer if enabled
 */
function guardeons_output_chat_snippet(){
    $enabled = get_theme_mod('guardeons_enable_chat', false);
    $snippet = get_theme_mod('guardeons_chat_snippet', '');
    if (!$enabled || empty($snippet)) return;
    $allowed = [
        'script' => [
            'type' => true,
            'src' => true,
            'async' => true,
            'defer' => true,
            'crossorigin' => true,
        ],
    ];
    echo wp_kses($snippet, $allowed);
}
add_action('wp_footer', 'guardeons_output_chat_snippet');

function guardeons_customize_register_chat($wp_customize){
    $wp_customize->add_section('guardeons_chat', [
        'title' => __('Live Chat', 'guardeons'),
        'panel' => 'guardeons_theme_options',
    ]);
    $wp_customize->add_setting('guardeons_enable_chat', [
        'default' => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ]);
    $wp_customize->add_control('guardeons_enable_chat', [
        'label' => __('Enable live chat snippet', 'guardeons'),
        'type' => 'checkbox',
        'section' => 'guardeons_chat',
    ]);
    $wp_customize->add_setting('guardeons_chat_snippet', [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('guardeons_chat_snippet', [
        'label' => __('Chat snippet (script tag)', 'guardeons'),
        'type' => 'textarea',
        'section' => 'guardeons_chat',
        'description' => __('Paste only the <script> tag provided by your chat provider.', 'guardeons'),
    ]);
}
add_action('customize_register', 'guardeons_customize_register_chat');

// Include modular features
require_once get_template_directory() . '/inc/testimonials-cpt.php';
require_once get_template_directory() . '/inc/customizer-newsletter.php';
require_once get_template_directory() . '/inc/icons.php';

/**
 * Contact form handler (admin-post)
 */
function guardeons_handle_contact_form() {
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'guardeons_contact')) {
        wp_die(__('Security check failed.', 'guardeons'));
    }

    $service_interest = isset($_POST['service_interest']) ? array_map('sanitize_text_field', (array) $_POST['service_interest']) : [];
    $project_details = isset($_POST['project_details']) ? wp_kses_post($_POST['project_details']) : '';
    $budget_range = isset($_POST['budget_range']) ? sanitize_text_field($_POST['budget_range']) : '';
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

    $to = get_theme_mod('guardeons_contact_email', get_bloginfo('admin_email'));
    $subject = sprintf(__('New Contact Request from %s', 'guardeons'), $name);
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    $body  = '<h2>' . esc_html__('New Lead - GuardEons Contact Form', 'guardeons') . '</h2>';
    $body .= '<p><strong>' . esc_html__('Name', 'guardeons') . ':</strong> ' . esc_html($name) . '</p>';
    $body .= '<p><strong>' . esc_html__('Company', 'guardeons') . ':</strong> ' . esc_html($company) . '</p>';
    $body .= '<p><strong>' . esc_html__('Email', 'guardeons') . ':</strong> ' . esc_html($email) . '</p>';
    $body .= '<p><strong>' . esc_html__('Phone', 'guardeons') . ':</strong> ' . esc_html($phone) . '</p>';
    $body .= '<p><strong>' . esc_html__('Budget', 'guardeons') . ':</strong> ' . esc_html($budget_range) . '</p>';
    $body .= '<p><strong>' . esc_html__('Interests', 'guardeons') . ':</strong> ' . esc_html(implode(', ', $service_interest)) . '</p>';
    $body .= '<p><strong>' . esc_html__('Project Details', 'guardeons') . ':</strong><br>' . wpautop(wp_kses_post($project_details)) . '</p>';

    if ($email) {
        $headers[] = 'Reply-To: ' . $email;
    }

    wp_mail($to, $subject, $body, $headers);

    wp_safe_redirect(add_query_arg('contact', 'success', wp_get_referer() ?: home_url('/')));
    exit;
}
add_action('admin_post_nopriv_guardeons_contact', 'guardeons_handle_contact_form');
add_action('admin_post_guardeons_contact', 'guardeons_handle_contact_form');

