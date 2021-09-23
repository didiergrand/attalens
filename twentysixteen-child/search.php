<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */


get_header();?>
</div></div>


 	<div class="site-inner searchResults">
 		<div class="site-content">
		<?php if ( have_posts() ) : ?>
		<header>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
				get_template_part( 'template-parts/content', 'search' );


			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->


</div><!-- .content-area -->
<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

