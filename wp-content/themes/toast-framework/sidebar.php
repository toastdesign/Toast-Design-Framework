<?php
/**
 * sidebar.php
 *
 * De hoofd sidebar
 *
 */
?>

<?php if ( is_active_sidebar('sidebar-1') ) : ?>
    <aside class="col-md-4">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php endif; ?>