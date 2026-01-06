<?php
/**
 * GovPress Framework - Apenas cor de fundo do menu
 */

// Segurança
if (!defined('ABSPATH')) exit;

/**
 * Registra as opções no Customizer
 */
function inst_customizer_menu($wp_customize) {
    // Seção pro menu
    $wp_customize->add_section('inst_menu_options', array(
        'title'    => 'Configurações do Framework',
        'priority' => 30,
    ));

    // Só a cor de fundo do menu - recarrega a página
    $wp_customize->add_setting('inst_menu_bg_color', array(
        'default'   => '#121212',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh', // Recarrega tudo
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'inst_menu_bg_color', array(
        'label'    => 'Cor de Fundo do Menu',
        'section'  => 'inst_menu_options',
        'settings' => 'inst_menu_bg_color',
    )));
}
add_action('customize_register', 'inst_customizer_menu');

/**
 * Gera o CSS da cor de fundo
 */
function inst_gerar_css_menu() {
    // Busca o valor salvo no banco usando o novo ID genérico
    $bg_color = get_theme_mod('inst_menu_bg_color', '#121212');
    ?>
    <style id="inst-menu-bg-css">
        .menu-personalizado,
        .menu-2,
        .menu-mobile {
            background-color: <?php echo esc_attr($bg_color); ?> !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'inst_gerar_css_menu');