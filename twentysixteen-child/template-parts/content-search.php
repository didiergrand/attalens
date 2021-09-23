<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
                 					
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title( '<h3>', '</h3>' ); ?></a>
	<small><i>Publié le <?php the_time('j F Y') ?></i></small>
        <div class="row post-list">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="col-sm-4">
                <?php twentysixteen_post_thumbnail(); ?>
            </div>
            <div class="col-sm-8">
		<?php } else { ?>
            <div class="col-sm-12">
        <?php } ?>
			<?php twentysixteen_excerpt(); ?>
        </div>
    </div>
</article><!-- #post-## -->
<hr>