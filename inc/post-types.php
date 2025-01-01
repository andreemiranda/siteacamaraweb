<?php
/**
 * Register custom post types
 */

function cmpa_register_post_types() {
    // Parlamentares
    register_post_type('parlamentar', array(
        'labels' => array(
            'name' => __('Parlamentares', 'cmpa'),
            'singular_name' => __('Parlamentar', 'cmpa'),
            'add_new' => __('Adicionar Novo', 'cmpa'),
            'add_new_item' => __('Adicionar Novo Parlamentar', 'cmpa'),
            'edit_item' => __('Editar Parlamentar', 'cmpa'),
            'view_item' => __('Ver Parlamentar', 'cmpa'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
    ));

    // Mesa Diretora
    register_post_type('mesa_diretora', array(
        'labels' => array(
            'name' => __('Mesa Diretora', 'cmpa'),
            'singular_name' => __('Membro da Mesa', 'cmpa'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
    ));

    // Documentos Legislativos
    $documento_supports = array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields');
    
    $documento_types = array(
        'lei' => __('Leis', 'cmpa'),
        'resolucao' => __('Resoluções', 'cmpa'),
        'projeto_lei' => __('Projetos de Lei', 'cmpa'),
        'requerimento' => __('Requerimentos', 'cmpa'),
        'indicacao' => __('Indicações', 'cmpa'),
        'oficio' => __('Ofícios', 'cmpa'),
        'ata' => __('Atas', 'cmpa'),
    );

    foreach ($documento_types as $slug => $name) {
        register_post_type($slug, array(
            'labels' => array(
                'name' => $name,
                'singular_name' => rtrim($name, 's'),
                'add_new' => __('Adicionar Novo', 'cmpa'),
                'add_new_item' => sprintf(__('Adicionar Novo %s', 'cmpa'), rtrim($name, 's')),
                'edit_item' => sprintf(__('Editar %s', 'cmpa'), rtrim($name, 's')),
                'view_item' => sprintf(__('Ver %s', 'cmpa'), rtrim($name, 's')),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => $documento_supports,
            'menu_icon' => 'dashicons-media-document',
            'show_in_rest' => true,
        ));
    }
}
add_action('init', 'cmpa_register_post_types');