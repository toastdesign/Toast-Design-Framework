<?php 
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>

        </div> <!-- Einde row -->
    </div> <!-- Einde container -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <?php get_sidebar('footer'); ?>

            <div class="copyright">
                <p>
                    &copy; <?php echo date('Y'); ?>
                    <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <?php _e('Alle rechten voorbehouden', 'toast'); ?>
                </p>
            </div><!-- Einde copyright -->
        </div><!-- Einde container -->
    </footer><!-- Einde footer -->

    <?php wp_footer(); ?>
</body>
</html>