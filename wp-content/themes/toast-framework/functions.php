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

            // Toon de auteur
            printf(
                '<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
                esc_url(get_author_posts_url( get_the_author_meta('ID') ) ),
                get_the_author()
            );

            // Toon de datum
            echo '<li class="meta-date"> ' . get_the_date() . '</li>';

            // De categorieen
            $category_list = get_the_category_list(', ');
            if ( $category_list ) {
                echo '<li class="meta-categories"> ' . $category_list . '</li>';
            }

             // De tags
            $tag_list = get_the_tag_list('' ,', ');
            if ( $tag_list ) {
                echo '<li class="meta-categories"> ' . $tag_list . '</li>';
            }

            // Reacties link en aantal
            if ( comments_open() ) :
                echo '<li>' ;
                echo '<span class="meta-reply">';
                comments_popup_link( __('Laat een reactie achter', 'toast'), __('Een reactie op dit moment', 'toast'), __('bekijk alle % reacties', 'toast') );
                echo '</span>';
                echo '</li>';
            endif;

            // Edit link
            if ( is_user_logged_in() ) {
                echo '<li>';
                edit_post_link(__('Edit', 'toast'), '<span class="meta-edit">', '</span>');
                echo '</li>';
            }
        }
    }
}

?>