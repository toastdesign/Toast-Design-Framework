<?php 
/**
 * content-link.php
 *
 * Dit is het standaard template voor het tonen van articelen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
    <!-- Article content -->
    <div class="entry-content">
        <?php 
            the_content( __( 'Lees verder &rarr;', 'toast') );

            wp_link_pages();
        ?>    
    </div>
    
    <!-- Article footer -->
    <footer class="entry-footer">
        <p class="entry-meta">
            <?php 
                // Toon de article meta data
                toast_post_meta();
            ?>
        </p>
        
        <?php 
            // Als we een single pagina hebben en de bio van de auteur bestaat, dan tonen we die
            if ( is_single() && get_the_author_meta( 'description' ) ) {
                echo '<h2>' . __('Geschreven door ', 'toast') . get_the_author() . '</h2>';
                echo '<p>' . the_author_meta('description') . '</p>';
            }
        ?>
    </footer>
</article>