<?php
/**
 * The template for displaying document archives
 */

get_header();

$post_type = get_post_type();
$post_type_obj = get_post_type_object($post_type);
?>

<main class="site-main">
    <div class="container mx-auto px-4 py-8">
        <header class="archive-header mb-8">
            <h1 class="text-3xl font-bold text-center">
                <?php echo esc_html($post_type_obj->labels->name); ?>
            </h1>
        </header>

        <div class="grid gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'documento');
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