<?php 
/**
 * content-quote.php
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
    </footer>
</article>