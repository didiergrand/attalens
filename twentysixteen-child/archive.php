<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
</div>
</div>

        <div id="carousel-content" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php	if ( has_post_thumbnail() ) { ?>
			<?php 
			$n++;
			if($n=='1'){?>
				<div class="item active"><?
				$nbrSlides = '1';
			}else{ ?>
				<div class="item"><?
				$nbrSlides = 'plus';
			}
			
			
			the_post_thumbnail( 'insideBanner-size' ); ?>
                </div>
            
            
	<?php } ?>
    
    
<?php endwhile; ?>
    <?php if($nbrSlides == 'plus'){ ?>
			<a class="left carousel-control" href="#carousel-content" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-content" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
    <?php } ?>
    
            </div>
        </div>


    

<?php endif; ?>





 	<div class="site-inner">
 		<div class="site-content">

		<div id="actualite">

		<?php if ( have_posts() ) : ?>
        
        
        
        
			<header class="entry-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>
			<div class="content-area">
				<main id="main" class="site-main" role="main">
					 <div class="row">
						 <div class="col-md-12">
							 <div class="post">
								 <div class="entry">

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'actualites' );

			// End the loop.
			endwhile; ?>
</div>
							</div> <!-- closes the first div box -->
						</div>
			<?php // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
