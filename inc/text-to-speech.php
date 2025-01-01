<?php
/**
 * Text-to-speech functionality
 */

function cmpa_enqueue_tts_scripts() {
    if (is_single() && 'post' === get_post_type()) {
        wp_enqueue_script(
            'cmpa-tts',
            get_template_directory_uri() . '/assets/js/text-to-speech.js',
            array(),
            '1.0.0',
            true
        );

        // Localize script with post content
        wp_localize_script('cmpa-tts', 'cmpaTTS', array(
            'content' => wp_strip_all_tags(get_the_content()),
            'title' => get_the_title(),
            'lang' => get_bloginfo('language'),
            'i18n' => array(
                'play' => __('Ouvir conteúdo', 'cmpa'),
                'pause' => __('Pausar', 'cmpa'),
                'resume' => __('Continuar', 'cmpa'),
                'stop' => __('Parar', 'cmpa'),
            )
        ));
    }
}
add_action('wp_enqueue_scripts', 'cmpa_enqueue_tts_scripts');

function cmpa_add_tts_button() {
    if (is_single() && 'post' === get_post_type()) {
        echo '<div class="cmpa-tts-controls mt-6 flex items-center gap-4">
            <button id="ttsPlayButton" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6v12m-3-6h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ' . esc_html__('Ouvir conteúdo', 'cmpa') . '
            </button>
            <button id="ttsPauseButton" class="hidden inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10 4h4v16h-4z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ' . esc_html__('Pausar', 'cmpa') . '
            </button>
            <button id="ttsStopButton" class="hidden inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="6" y="6" width="12" height="12" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ' . esc_html__('Parar', 'cmpa') . '
            </button>
        </div>';
    }
}
add_action('cmpa_after_post_content', 'cmpa_add_tts_button');