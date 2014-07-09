<?php
/**
 * comments.php
 *
 * De reacties op een pagina
 *
 */
?>

<?php 
    
    if ( ! empty ( $_SERVER['SCRIPT-FILENAME'] ) && basename( $_SERVER['SCRIPT-FILENAME']) == 'templates/comments.php') {
        die( __('Je hebt niet de bevoegdheden om deze pagina te bekijken', 'toast') );
    }

?>

<?php 
    if ( post_password_required() ) : ?>
        <p>
            <?php 
                _e( 'Dit artikel heeft een wachtwoord. Voer het wachtwoord in om deze te bekijken', 'toast' );

                return;
            ?>
        </p>
    <?php endif; ?>
?>

<!-- Comments Area -->
<div class="comments-area" id="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php 
                printf( _nx( 'Eén reactie', '%1$s reacties', get_comments_number(), 'Reactie titel', 'toast' ), number_format_i18n( get_comments_number() ) );
            ?>
        </h2>

        <ol class="comments">
            <?php wp_list_comments(); ?>
        </ol>

        <?php 
            // If the comments are paginated, display the controls.
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="comment-nav" role="navigation">
            <p class="comment-nav-prev">
                <?php previous_comments_link( __( '&larr; Eerdere reacties', 'toast' ) ); ?>
            </p>

            <p class="comment-nav-next">
                <?php next_comments_link( __( 'Nieuwere reacties &rarr;', 'toast' ) ); ?>
            </p>
        </nav> <!-- end comment-nav -->
        <?php endif; ?>

        <?php 
            // If the comments are closed, display an info text.
            if ( ! comments_open() && get_comments_number() ) :
        ?>
            <p class="no-comments">
                <?php _e( 'U kunt geen reacties plaatsen', 'toast' ); ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <?php comment_form(); ?>
</div> <!-- end comments-area -->