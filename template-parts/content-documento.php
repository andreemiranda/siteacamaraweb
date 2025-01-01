<?php
/**
 * Template part for displaying documentos
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 bg-white rounded-lg shadow-md overflow-hidden'); ?>>
    <div class="p-6">
        <header class="entry-header mb-4">
            <?php the_title('<h2 class="entry-title text-2xl font-bold">', '</h2>'); ?>
            
            <div class="entry-meta text-gray-600 text-sm mt-2">
                <?php
                echo sprintf(
                    __('Publicado em %s', 'cmpa'),
                    get_the_date()
                );

                if ($parlamentar_id = get_post_meta(get_the_ID(), 'parlamentar_autor', true)) {
                    $parlamentar = get_post($parlamentar_id);
                    if ($parlamentar) {
                        echo ' | ' . sprintf(
                            __('Autor: %s', 'cmpa'),
                            '<a href="' . get_permalink($parlamentar) . '">' . $parlamentar->post_title . '</a>'
                        );
                    }
                }
                ?>
            </div>
        </header>

        <div class="entry-content prose max-w-none">
            <?php the_content(); ?>
        </div>

        <?php if ($arquivo = get_post_meta(get_the_ID(), 'arquivo_documento', true)): ?>
            <div class="mt-6">
                <a href="<?php echo esc_url($arquivo); ?>" 
                   class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <?php _e('Baixar Documento', 'cmpa'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</article>