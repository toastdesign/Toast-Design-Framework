<?php
/*
 * index.php
 *
 * Hoofd template file
 */
?>

<?php get_header(); ?>

<div class="main-content col-md-8" role="main">
    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'templates/content', get_post_format() ); ?> 
    <?php endwhile; ?>

    <?php toast_paging_nav(); ?>

    <?php else : ?>
        <?php get_template_part('templates/content', 'none'); ?>
    <?php endif; ?>
</div> <!-- Einde main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
