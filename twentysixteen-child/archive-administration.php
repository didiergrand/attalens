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
<?php query_posts(array( 'post_type' => 'administration','administration_categorie' => 'texte' )); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php	if ( has_post_thumbnail() ) { ?>
	<div class="post-thumbnail inside-banner">
	 <?php the_post_thumbnail( 'insideBanner-size' ); ?>
	</div>
	<?php } ?>
<?php endwhile; ?>
<?php endif; ?>
		 <div id="administration">
			 <?php query_posts(array( 'post_type' => 'administration','administration_categorie' => 'texte' )); ?>
			 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				 <header class="entry-header">
					 <h1 class="entry-title"><?php the_title(); ?></h1>
				 </header>
				 <div class="content-area">
					 <div class="row">
						 <div class="col-md-12">
							 <div class="post">
								 <div class="entry">
									 <?php the_content(); ?>
								 </div>
							 </div> <!-- closes the first div box -->
						 </div>
					 </div>
				 <?php endwhile; else: ?>
					 <p>Sorry, no posts matched your criteria.</p>
				 <?php endif; ?>
				 <div class="row personnel">
					 <?php query_posts(array( 'post_type' => 'administration','administration_categorie' => 'personnel' )); ?>
					 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						 <div class="col-md-6">
			 				<div class="post">
							  <?php	if ( has_post_thumbnail() ) {
									$thumbnail = $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );?>
							  <div class="personnel-picture circular" style="background-image:url('<?=$thumbnail[0]; ?>')"></div>
							  <?php } ?>
			 					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry">
						    	<?php the_content(); ?>
						  	</div>
						 	</div> <!-- closes the first div box -->
						</div>
					 	<?php endwhile; else: ?>
					 		<p>Sorry, no posts matched your criteria.</p>
					 	<?php endif; ?>
	 			 	</div>
				</div>
			</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
