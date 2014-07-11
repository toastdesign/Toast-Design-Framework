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
        $lang_dir = THEMEROOT . '/languages';
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

    add_action('after_setup_theme', 'toast_setup');
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

/* ==========================================================================
6.0 - Toont een navigatie voor vorige en volgende posts/artikelen
========================================================================== */
if ( ! function_exists('toast_paging_nav' ) ) {
    function toast_paging_nav() { ?>
        <ul>
            <?php 
                if ( get_previous_posts_link() ) : ?>
                <li class="next">
                    <?php previous_posts_link( __('Nieuwere artikelen &rarr;', 'toast') ) ?>
                </li>
                <?php endif;
            ?>
            <?php 
                if ( get_next_posts_link() ) : ?>
                <li class="previous">
                    <?php next_posts_link( __('&larr; Oudere artikelen', 'toast') ) ?>
                </li>
                <?php endif;
            ?>
        </ul> <?php 
    }
}

/* ==========================================================================
7.0 - Registreer de widgets
========================================================================== */
if (! function_exists('toast_widget_init') ) {
    function toast_widget_init() {
        if ( function_exists('register_sidebar') ) {
            register_sidebar(
                array(
                    'name' => __( 'Main Widget Area', 'toast' ),
                    'id' => 'sidebar-1',
                    'description' => __( 'Appears on posts and pages.', 'toast' ),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div> <!-- end widget -->',
                    'before_title' => '<h5 class="widget-title">',
                    'after_title' => '</h5>',
                )
            );

            register_sidebar(
                array(
                    'name' => __( 'Footer Widget Area', 'toast' ),
                    'id' => 'sidebar-2',
                    'description' => __( 'Appears on the footer.', 'toast' ),
                    'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
                    'after_widget' => '</div> <!-- end widget -->',
                    'before_title' => '<h5 class="widget-title">',
                    'after_title' => '</h5>',
                )
            );
        }
    }

    add_action( 'widgets_init', 'toast_widget_init' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'toast_validate_length' ) ) {
    function toast_validate_length( $fieldValue, $minLength ) {
        // First, remove trailing and leading whitespace
        return ( strlen( trim( $fieldValue ) ) > $minLength );
    }
}

/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'toast_load_wp_head' ) ) {
    function toast_load_wp_head() {
        // Get the logos
        $logo = IMAGES . '/logo.png';
        $logo_retina = IMAGES . '/logo@2x.png';

        $logo_size = getimagesize( $logo );
        ?>
        
        <!-- Logo CSS -->
        <style type="text/css">
            .site-logo a {
                background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
                width: <?php echo $logo_size[0] ?>px;
                height: <?php echo $logo_size[1] ?>px;
                display: inline-block;
            }

            @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
            only screen and (-moz-min-device-pixel-ratio: 1.5),
            only screen and (-o-min-device-pixel-ratio: 3/2),
            only screen and (min-device-pixel-ratio: 1.5) {
                .site-logo a {
                    background: transparent url( <?php echo $logo_retina; ?> ) 0 0 no-repeat;
                    background-size: <?php echo $logo_size[0]; ?>px <?php echo $logo_size[1]; ?>px;
                }
            }
        </style>

        <?php
    }

    add_action( 'wp_head', 'toast_load_wp_head' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'toast_scripts' ) ) {
    function toast_scripts() {
        // Adds support for pages with threaded comments
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // Register scripts
        wp_register_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array( 'jquery' ), false, true );
        wp_register_script( 'toast-custom', SCRIPTS . '/scripts.js', array( 'jquery' ), false, true );

        // Load the custom scripts
        wp_enqueue_script( 'bootstrap-js' );
        wp_enqueue_script( 'toast-custom' );

        // Load the stylesheets
        wp_enqueue_style( 'font-awesome', THEMEROOT . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'toast-master', THEMEROOT . '/css/master.css' );
    }

    add_action( 'wp_enqueue_scripts', 'toast_scripts' );

}
?>