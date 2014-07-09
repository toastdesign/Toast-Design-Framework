<?php
/**
 * sidebar-footer.php
 *
 * De footer sidebar
 */
?>

<?php if ( is_active_sidebar('sidebar-2') ) : ?>
    <aside class="footer-sidebar">
        <div class="row">
            <?php dynamic_sidebar('sidebar-2'); ?>
        </div>
    </aside>
<?php endif; ?>