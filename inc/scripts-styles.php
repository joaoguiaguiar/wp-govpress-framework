<?php
/**
 * Carrega todos os CSS e JS do GovPress Framework
 */

// Segurança
if (!defined('ABSPATH')) exit;

/**
 * Carrega styles e scripts do tema
 */
function inst_carregar_assets() {
    // CSS do tema pai (Blocksy)
    wp_enqueue_style(
        'blocksy-parent-style', 
        get_template_directory_uri() . '/style.css'
    );

    // CSS do tema filho (Framework)
    wp_enqueue_style(
        'blocksy-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('blocksy-parent-style'),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // CSS dos menus 
    wp_enqueue_style(
        'inst-menu-style',
        get_stylesheet_directory_uri() . '/css/menu.css',
        array('blocksy-child-style'),
        filemtime(get_stylesheet_directory() . '/css/menu.css')
    );

    // JS apenas nas páginas necessárias
    if (is_front_page() || is_single() || is_page() || is_category()) {
        wp_enqueue_script(
            'inst-framework-script',
            get_stylesheet_directory_uri() . '/js/script.js',
            array('jquery'),
            filemtime(get_stylesheet_directory() . '/js/script.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'inst_carregar_assets', 100);

/**
 * Debug dos estilos carregados (só pra admin)
 */
function inst_debug_estilos() {
    if (!current_user_can('administrator')) return;
    
    global $wp_styles;
    echo "";
}
add_action('wp_head', 'inst_debug_estilos', 999);