<?php
/**
 * Template part for displaying parlamentares
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 bg-white rounded-lg shadow-md overflow-hidden'); ?>>
    <div class="grid md:grid-cols-3 gap-6">
        <?php if (has_post_thumbnail()): ?>
            <div class="md:col-span-1">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
            </div>
        <?php endif; ?>

        <div class="md:col-span-2 p-6">
            <header class="entry-header mb-4">
                <?php the_title('<h2 class="entry-title text-2xl font-bold">', '</h2>'); ?>
                
                <?php if (get_post_meta(get_the_ID(), 'cargo', true)): ?>
                    <p class="text-lg text-gray-600 mt-2">
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'cargo', true)); ?>
                    </p>
                <?php endif; ?>
            </header>

            <div class="entry-content prose max-w-none">
                <?php the_content(); ?>
            </div>

            <?php if (get_post_meta(get_the_ID(), 'partido', true)): ?>
                <div class="mt-4 pt-4 border-t">
                    <p class="text-gray-600">
                        <strong><?php _e('Partido:', 'cmpa'); ?></strong>
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'partido', true)); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>