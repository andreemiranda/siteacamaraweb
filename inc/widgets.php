<?php
/**
 * Custom widgets for the theme
 */

class CMPA_Latest_Documents_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cmpa_latest_documents',
            __('Últimos Documentos', 'cmpa'),
            array('description' => __('Exibe os últimos documentos legislativos', 'cmpa'))
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Últimos Documentos', 'cmpa');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        $document_type = !empty($instance['document_type']) ? $instance['document_type'] : 'lei';

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

        $query = new WP_Query(array(
            'post_type' => $document_type,
            'posts_per_page' => $number,
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ($query->have_posts()) :
            echo '<ul class="latest-documents">';
            while ($query->have_posts()) : $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Últimos Documentos', 'cmpa');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        $document_type = !empty($instance['document_type']) ? $instance['document_type'] : 'lei';

        $document_types = array(
            'lei' => __('Leis', 'cmpa'),
            'resolucao' => __('Resoluções', 'cmpa'),
            'projeto_lei' => __('Projetos de Lei', 'cmpa'),
            'requerimento' => __('Requerimentos', 'cmpa'),
            'indicacao' => __('Indicações', 'cmpa'),
            'oficio' => __('Ofícios', 'cmpa'),
            'ata' => __('Atas', 'cmpa'),
        );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título:', 'cmpa'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Número de itens:', 'cmpa'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>" 
                   name="<?php echo $this->get_field_name('number'); ?>" type="number" 
                   step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('document_type'); ?>"><?php _e('Tipo de Documento:', 'cmpa'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('document_type'); ?>" 
                    name="<?php echo $this->get_field_name('document_type'); ?>">
                <?php foreach ($document_types as $type => $label) : ?>
                    <option value="<?php echo esc_attr($type); ?>" 
                            <?php selected($document_type, $type); ?>>
                        <?php echo esc_html($label); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        $instance['document_type'] = (!empty($new_instance['document_type'])) ? $new_instance['document_type'] : 'lei';
        return $instance;
    }
}

function cmpa_register_widgets() {
    register_widget('CMPA_Latest_Documents_Widget');
}
add_action('widgets_init', 'cmpa_register_widgets');