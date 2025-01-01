<?php
/**
 * The template for displaying parlamentar archives
 */

get_header();
?>

<main class="site-main">
    <div class="container mx-auto px-4 py-8">
        <header class="archive-header mb-8">
            <h1 class="text-3xl font-bold text-center">
                <?php _e('Parlamentares', 'cmpa'); ?>
            </h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'parlamentar');
                endwhile;

                the_posts_pagination();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();