<?php
/**
 * The template for displaying the footer
 */
?>
    <footer class="site-footer bg-primary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 gap-8">
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-opacity-20 text-center text-gray-300">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
                   <?php _e('Todos os direitos reservados.', 'cmpa'); ?></p>
                <p class="mt-2"><?php _e('Desenvolvido por', 'cmpa'); ?> 
                   Carlos Andre Rocha Miranda</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>