<?php
/**
 * Theme Customizer settings
 */

function cmpa_customize_register($wp_customize) {
    // Seção de Cores
    $wp_customize->add_section('cmpa_colors', array(
        'title' => __('Cores do Tema', 'cmpa'),
        'priority' => 30,
    ));

    // Opções de Cores
    $color_options = array(
        'primary_color' => array(
            'default' => '#1e40af',
            'label' => __('Cor Principal', 'cmpa'),
        ),
        'secondary_color' => array(
            'default' => '#dc2626',
            'label' => __('Cor Secundária', 'cmpa'),
        ),
        'accent_color' => array(
            'default' => '#eab308',
            'label' => __('Cor de Destaque', 'cmpa'),
        ),
    );

    foreach ($color_options as $setting => $options) {
        $wp_customize->add_setting($setting, array(
            'default' => $options['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label' => $options['label'],
            'section' => 'cmpa_colors',
        )));
    }

    // Redes Sociais
    $wp_customize->add_section('cmpa_social', array(
        'title' => __('Redes Sociais', 'cmpa'),
        'priority' => 35,
    ));

    $social_networks = array(
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('social_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('social_' . $network, array(
            'label' => $label,
            'section' => 'cmpa_social',
            'type' => 'url',
        ));
    }
}