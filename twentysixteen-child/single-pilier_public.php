<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

 get_header();?>

 </div>
 </div>
 <?php	if ( has_post_thumbnail() ) { ?>
 <div class="post-thumbnail inside-banner">
 	<?php the_post_thumbnail( 'insideBanner-size' ); ?>
 </div>
 <?php } ?>

 	<div class="site-inner">
 		<div class="site-content">
 	<header class="entry-header">
 		<?php the_title( '<h1 class="entry-title"><a href="/pilier_public/">Pilier public</a> : ', '</h1>' ); ?>
 	</header><!-- .entry-header -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                    <div class="row post-list">
                   
                        <div class="col-sm-12">
                		<small><i>Publié le <?php the_time('j F Y') ?></i></small>
                        <?php twentysixteen_excerpt(); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </article><!-- #post-## -->
            <hr>
			
			
			
			
			
			
			<?
			

			// End of the loop.
			
			
			
		endwhile;
		?>

	</main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
