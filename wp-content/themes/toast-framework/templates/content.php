<?php 
/**
 * content.php
 *
 * Dit is het standaard template voor het tonen van articelen
 *
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- header -->
    <header class="entry-header">
        <?php 
        // Als het article geen password heeft laat dan de afbeelding zien
        if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <figure class="entry-thumbnail"><?php the_post_thumnail(); ?></figure>
        <?php endif;

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
</article>