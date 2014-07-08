<?php  
/**
 * function.php
 *
 * De functies van het thema
 *
 */

/* ==========================================================================
1.0 - Define constants
========================================================================== */
define('THEMEROOT', get_stylesheet_directory_uri() );
define('IMAGES', THEMEROOT . '/images' );
define('SCRIPTS', THEMEROOT . '/js' );
define('FRAMEWORK', get_template_directory() . '/framework' );

/* ==========================================================================
2.0 - Framework laden
========================================================================== */
require_once(FRAMEWORK . '/init.php' );


/* ==========================================================================
3.0 Geef de breedte op van het thema design
========================================================================== */
if ( ! isset( $content_width) ) {
    $content_width = 960;
}

/* ==========================================================================
4.0 - Geef de defaults aan van het tehma en de ondersteunde onderdelen
========================================================================== */
if ( ! function_exists('toast_setup') ) {
    function toast_setup() {
        /* Maak het thema vertaalbaar  ----------- */
        $lang_dir = THEMEROOT . 'languages';
        load_theme_textdomain( 'toast', $lang_dir );

        /* Voeg ondersteuning toe voor verschillende post formats  ----------- */
        add_theme_support( 'post-formats', 
            array(
                'gallery',
                'link',
                'image',
                'quote',
                'video',
                'audio'
            )
         );

        /* Ondersteuning voor feed links   ----------- */
        add_theme_support( 'automatic-feed-links' );

        /* Ondersteuning voor thumbnails  ----------- */
        add_theme_support( 'post-thumbnails' );

        /* Ondersteuning voor menus  ----------- */
        register_nav_menus(
            array(
                'main-menu' => __('Main menu', 'toast')
            )
        );
    }   

    add_action('after_theme_setup', 'toast_setup');
}


/* ==========================================================================
5.0 - Toon de meta informatie voor een article
========================================================================== */
if ( ! function_exists('toast_post_meta') ) {
    function toast_post_meta() {
        echo '<ul class="list-inline entry-meta">';

        if ( get_post_type() === 'post') {
            // Als het een sticky post is geef dit dan aan
            if (is_sticky() ) {
                echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i>' . __('Sticky', 'toast' ) . '</li>';
            }
        }
    }
}

?>