<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="post-thumbnail mb-4">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
        </div>
    <?php endif; ?>

    <header class="entry-header mb-4">
        <?php
        if (is_singular()):
            the_title('<h1 class="entry-title text-3xl font-bold">', '</h1>');
        else:
            the_title('<h2 class="entry-title text-2xl font-bold"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        endif;
        ?>

        <div class="entry-meta text-gray-600 text-sm">
            <?php
            echo sprintf(
                __('Publicado em %s', 'cmpa'),
                get_the_date()
            );
            ?>
        </div>
    </header>

    <div class="entry-content prose max-w-none">
        <?php
        if (is_singular()):
            the_content();
            do_action('cmpa_after_post_content');
        else:
            the_excerpt();
        endif;
        ?>
    </div>
</article>