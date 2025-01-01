<?php
/**
 * The header for our theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">
    <div class="top-bar bg-primary text-white py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="datetime">
                <?php echo date_i18n('d/m/Y - H:i:s'); ?>
            </div>
            <div class="social-links">
                <?php if (get_theme_mod('social_facebook')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="hover:text-blue-300">
                        <i class="dashicons dashicons-facebook"></i>
                    </a>
                <?php endif; ?>
                <?php if (get_theme_mod('social_instagram')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="hover:text-blue-300">
                        <i class="dashicons dashicons-instagram"></i>
                    </a>
                <?php endif; ?>
                <?php if (get_theme_mod('social_youtube')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" class="hover:text-blue-300">
                        <i class="dashicons dashicons-youtube"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <header class="site-header bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>
                    <div>
                        <h1 class="text-2xl font-bold text-primary">
                            <?php bloginfo('name'); ?>
                        </h1>
                        <p class="text-gray-600">
                            <?php bloginfo('description'); ?>
                        </p>
                    </div>
                </div>

                <nav class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'flex gap-6',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>