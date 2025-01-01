<?php
/**
 * Register meta boxes for custom post types
 */

function cmpa_add_meta_boxes() {
    // Parlamentar Meta Box
    add_meta_box(
        'parlamentar_details',
        __('Detalhes do Parlamentar', 'cmpa'),
        'cmpa_parlamentar_meta_box',
        'parlamentar',
        'normal',
        'high'
    );

    // Documento Meta Box
    $documento_types = array('lei', 'resolucao', 'projeto_lei', 'requerimento', 'indicacao', 'oficio', 'ata');
    foreach ($documento_types as $type) {
        add_meta_box(
            'documento_details',
            __('Detalhes do Documento', 'cmpa'),
            'cmpa_documento_meta_box',
            $type,
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'cmpa_add_meta_boxes');

function cmpa_parlamentar_meta_box($post) {
    wp_nonce_field('parlamentar_meta_box', 'parlamentar_meta_box_nonce');
    
    $cargo = get_post_meta($post->ID, 'cargo', true);
    $partido = get_post_meta($post->ID, 'partido', true);
    $email = get_post_meta($post->ID, 'email', true);
    $telefone = get_post_meta($post->ID, 'telefone', true);
    ?>
    <div class="cmpa-meta-box">
        <p>
            <label for="cargo"><?php _e('Cargo:', 'cmpa'); ?></label>
            <input type="text" id="cargo" name="cargo" value="<?php echo esc_attr($cargo); ?>" class="widefat">
        </p>
        <p>
            <label for="partido"><?php _e('Partido:', 'cmpa'); ?></label>
            <input type="text" id="partido" name="partido" value="<?php echo esc_attr($partido); ?>" class="widefat">
        </p>
        <p>
            <label for="email"><?php _e('Email:', 'cmpa'); ?></label>
            <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="widefat">
        </p>
        <p>
            <label for="telefone"><?php _e('Telefone:', 'cmpa'); ?></label>
            <input type="text" id="telefone" name="telefone" value="<?php echo esc_attr($telefone); ?>" class="widefat">
        </p>
    </div>
    <?php
}

function cmpa_documento_meta_box($post) {
    wp_nonce_field('documento_meta_box', 'documento_meta_box_nonce');
    
    $numero = get_post_meta($post->ID, 'numero', true);
    $data = get_post_meta($post->ID, 'data', true);
    $parlamentar_autor = get_post_meta($post->ID, 'parlamentar_autor', true);
    $arquivo = get_post_meta($post->ID, 'arquivo_documento', true);
    ?>
    <div class="cmpa-meta-box">
        <p>
            <label for="numero"><?php _e('Número:', 'cmpa'); ?></label>
            <input type="text" id="numero" name="numero" value="<?php echo esc_attr($numero); ?>" class="widefat">
        </p>
        <p>
            <label for="data"><?php _e('Data:', 'cmpa'); ?></label>
            <input type="date" id="data" name="data" value="<?php echo esc_attr($data); ?>" class="widefat">
        </p>
        <p>
            <label for="parlamentar_autor"><?php _e('Autor:', 'cmpa'); ?></label>
            <?php
            wp_dropdown_pages(array(
                'post_type' => 'parlamentar',
                'selected' => $parlamentar_autor,
                'name' => 'parlamentar_autor',
                'show_option_none' => __('Selecione um parlamentar', 'cmpa'),
                'class' => 'widefat'
            ));
            ?>
        </p>
        <p>
            <label for="arquivo_documento"><?php _e('Arquivo:', 'cmpa'); ?></label>
            <input type="text" id="arquivo_documento" name="arquivo_documento" 
                   value="<?php echo esc_url($arquivo); ?>" class="widefat">
            <button type="button" class="button" id="upload_arquivo_button">
                <?php _e('Upload', 'cmpa'); ?>
            </button>
        </p>
    </div>
    <?php
}

function cmpa_save_meta_boxes($post_id) {
    // Verify nonces and user permissions
    if (!isset($_POST['parlamentar_meta_box_nonce']) && 
        !isset($_POST['documento_meta_box_nonce'])) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save parlamentar meta
    $parlamentar_fields = array('cargo', 'partido', 'email', 'telefone');
    foreach ($parlamentar_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Save documento meta
    $documento_fields = array('numero', 'data', 'parlamentar_autor', 'arquivo_documento');
    foreach ($documento_fields as $field) {
        if (isset($_POST[$field])) {
            if ($field === 'arquivo_documento') {
                update_post_meta($post_id, $field, esc_url_raw($_POST[$field]));
            } else {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'cmpa_save_meta_boxes');