<?php
/**
 * Template Name: CNRS WebKit partner with sidebar
 * Template Post Type: partenaire
 * 
 * The template for displaying CNRS WebKit partner with sidebar
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

// Translators: Template Name translation.
__('CNRS WebKit partner with sidebar', 'cnrswebkit');

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'partenaire' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				/* translators: this will be rendered as "Published in <span>page title</span>" */
				the_post_navigation( array(
				'prev_text' => '<span class="meta-nav">' . __('Published in', 'cnrswebkit'). '</span><span class="post-title">%title</span>',
			    ) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'cnrswebkit' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next page :', 'cnrswebkit' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'cnrswebkit' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous page :', 'cnrswebkit' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
