<?php 
/**
 * archive.php
 *
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php 
						if ( is_day() ) {
							printf( __( 'Dagelijkse archieven voor %s', 'toast' ), get_the_date() );
						} elseif ( is_month() ) {
							printf( __( 'Mossnthly Archives for %s', 'toast' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'toast' ) ) );
						} elseif ( is_year() ) {
							printf( __( 'Yearly Archives for %s', 'toast' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'toast' ) ) );
						} else {
							_e( 'Archives', 'toast' );
						}
					?>
				</h1>
			</header>

			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'templates/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php alpha_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'templates/content', 'none' ); ?>
		<?php endif; ?>
	</div> <!-- end main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>