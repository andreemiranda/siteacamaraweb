<?php
/**
 * Template Name: Página Inicial
 */

get_header();
?>

<main class="site-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="container mx-auto px-4 py-8">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>

    <!-- Parlamentares Grid -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8"><?php _e('Parlamentares', 'cmpa'); ?></h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php
                $parlamentares = new WP_Query(array(
                    'post_type' => 'parlamentar',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                ));

                if ($parlamentares->have_posts()) :
                    while ($parlamentares->have_posts()) : $parlamentares->the_post();
                ?>
                    <div class="text-center">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium', array(
                                    'class' => 'w-full h-auto rounded-lg shadow-md mb-4'
                                )); ?>
                            <?php endif; ?>
                            <h3 class="font-semibold"><?php the_title(); ?></h3>
                            <?php if ($cargo = get_post_meta(get_the_ID(), 'cargo', true)): ?>
                                <p class="text-gray-600 text-sm"><?php echo esc_html($cargo); ?></p>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Últimas Notícias -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8"><?php _e('Últimas Notícias', 'cmpa'); ?></h2>
            
            <div class="grid md:grid-cols-3 gap-6">
                <?php
                $noticias = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                if ($noticias->have_posts()) :
                    while ($noticias->have_posts()) : $noticias->the_post();
                        get_template_part('template-parts/content', 'excerpt');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();