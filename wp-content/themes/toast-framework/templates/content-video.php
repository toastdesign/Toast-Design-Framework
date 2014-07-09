<?php 
/**
 * content-video.php
 *
 * Dit is het standaard template voor het tonen van video artikelen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- header -->
    <header class="entry-header"> <?php         
        // Als het een singel pagina is dan laten we de titel zien
        // anders laten we de titel als link zien
        if ( is_single() ) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php endif; ?>

        <p class="entry-meta">
            <?php 
                // Toon de article meta data
                toast_post_meta();
            ?>
        </p>
    </header>
    
    <!-- Article content -->
    <div class="entry-content">
        <?php 
            the_content( __( 'Lees verder &rarr;', 'toast') );

            wp_link_pages();
        ?>    
    </div>
    
    <!-- Article footer -->
    <footer class="entry-footer">
        <?php 
            // Als we een single pagina hebben en de bio van de auteur bestaat, dan tonen we die
            if ( is_single() && get_the_author_meta( 'description' ) ) {
                echo '<h2>' . __('Geschreven door ', 'toast') . get_the_author() . '</h2>';
                echo '<p>' . the_author_meta('description') . '</p>';
            }
        ?>
    </footer>
</article>