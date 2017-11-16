<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Colorskin
 */
if ( ! function_exists( 'social_links' ) ) :
/**
 * This function is for social links display on header top bar
 *
 * Get links through Theme Options
 */
function colorskin_social_links() {
    
	$social_links = array(
		'social_facebook'	=> __( 'Facebook', 'colorskin' ),
		'social_twitter'	=> __( 'Twitter', 'colorskin' ),
		'social_googleplus' => __( 'Google-Plus', 'colorskin' ),
	);
	?>
	<ul class="social-links cf">
		<?php $i=0;
			$links_output = '';
			foreach( $social_links as $key => $value ) {
				$link = get_theme_mod( $key , '' );
				if ( !empty( $link ) ) {
					if ( get_theme_mod( $key.'_checkbox', 0 ) == 1 ) { $new_tab = 'target="_blank"'; } else { $new_tab = ''; }
					$links_output .=
						'<li><a href="'.esc_url( $link ).'" '.$new_tab.'><i class="fa fa-'.strtolower($value).'"></i></a></li>';
				} $i++;
			}
			echo $links_output;
		?>
	</ul><!-- ul.social-links -->
	<?php
}
endif;

if ( ! function_exists( 'colorskin_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function colorskin_content_nav( $nav_id ) {
	global $wp_query, $post;
    
	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
        
		if ( ! $next && ! $previous )
			return;
	}
    
	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
        
	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
    
	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'colorskin' ); ?></h3>
        
	<?php if ( is_single() ) : // navigation links for single posts ?>
        
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'colorskin' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'colorskin' ) . '</span>' ); ?>
        
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
        
		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colorskin' ) ); ?></div>
		<?php endif; ?>
        
		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'colorskin' ) ); ?></div>
		<?php endif; ?>
        
	<?php endif; ?>
    
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // colorskin_content_nav

if ( ! function_exists( 'colorskin_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function colorskin_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
    
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
	$byline = sprintf(
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
    
	echo '<span class="byline"><i class="fa fa-user" aria-hidden="true"></i> ' . $byline . '</span><span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i> ' . $posted_on . '</span>';
	
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
		comments_popup_link( __( 'Leave a comment', 'colorskin' ), __( '1 Comment', 'colorskin' ), __( '% Comments', 'colorskin' ) );
		echo '</span>';
	}
    
    edit_post_link( __( 'Edit', 'colorskin' ), '<span class="edit-link"><i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' );
    
}
endif;

if ( ! function_exists( 'colorskin_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function colorskin_entry_footer() {
	// Hide category and tag text for pages.
    $categories_list = get_the_category_list( __( ' ', 'colorskin' ) );
    $tags_list = get_the_tag_list( '', __( ' ', 'colorskin' ) );
    
    if ( 'post' == get_post_type() && ( $categories_list && colorskin_categorized_blog() || $tags_list && is_single() ) ) {
        
        echo '<footer class="entry-footer">';
        
        if ( $categories_list && colorskin_categorized_blog() ) {
            printf( '<span class="cat-links"><i class="fa fa-folder-open" aria-hidden="true"></i> %1$s</span>', $categories_list );
        }
        
        if ( $tags_list && is_single() ) {
            printf( '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i> %1$s</span>', $tags_list );
        }
        
        echo '</footer><!-- .entry-footer -->';
        
    }
	
}
endif;

if ( ! function_exists( 'colorskin_footer_copyright' ) ) :
    /**
     * function to show the footer info, copyright information
     */
    function colorskin_footer_copyright() {
        $site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
        
        $wp_link = '<a href="'.esc_url( 'https://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'colorskin' ) . '"><span>' . __( 'WordPress', 'colorskin' ) . '</span></a>';
        
        $tg_link =  '<a href="'.esc_url( 'https://profiles.wordpress.org/effpandim' ).'" target="_blank" title="'.esc_attr__( 'colorskin', 'colorskin' ).'" rel="designer"><span>'.__( 'Effpandim', 'colorskin') .'</span></a>';
        
        $default_footer_value = sprintf( __( 'Copyright &copy; %1$s %2$s.', 'colorskin' ), date( 'Y' ), $site_link );
        
        $info_footer_value = sprintf( __( 'Powered by %s.', 'colorskin' ), $wp_link ).' | '.sprintf( __( 'Theme: %1$s by %2$s.', 'colorskin' ), 'colorskin', $tg_link );
        
        $colorskin_footer_copyright = '<div class="copyright col-sm-6 col-xs-12">'.$default_footer_value.'</div><div class="info-links col-sm-6 col-xs-12">'.$info_footer_value.'</div>';
        echo $colorskin_footer_copyright;
    }
endif;
add_action( 'colorskin_footer_copyright', 'colorskin_footer_copyright', 10 );

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function colorskin_categorized_blog() {
	$all_the_cool_cats = get_transient( 'colorskin_categories' );
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );
        
		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
        
		set_transient( 'colorskin_categories', $all_the_cool_cats );
	}
    
	if ( $all_the_cool_cats > 1 || is_preview() ) {
		// This blog has more than 1 category so colorskin_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so colorskin_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in colorskin_categorized_blog.
 */
function colorskin_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'colorskin_categories' );
}
add_action( 'edit_category', 'colorskin_category_transient_flusher' );
add_action( 'save_post',     'colorskin_category_transient_flusher' );