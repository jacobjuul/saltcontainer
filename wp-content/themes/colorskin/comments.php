<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package  Colorskin
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php comments_number( __('No Comments &#187;', 'colorskin'), __('Comment (1)', 'colorskin'), __('Comments (%)', 'colorskin')); ?></h2>
        
        <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
        <nav class="comments-nav">
            <div class="nav-previous"><?php previous_comments_link(); ?></div>
            <div class="nav-next"><?php next_comments_link(); ?></div>
        </nav><!--/.comments-nav-->
        <?php endif; ?>
        
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->
        
        <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
        <nav class="comments-nav">
            <div class="nav-previous"><?php previous_comments_link(); ?></div>
            <div class="nav-next"><?php next_comments_link(); ?></div>
        </nav><!--/.comments-nav-->
        <?php endif;
        
	endif; // Check for have_comments().
    
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'colorskin' ); ?></p>
	<?php
	endif;
    
	comment_form();
	?>
    
</div><!-- #comments -->