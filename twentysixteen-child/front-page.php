<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
</div>
</div>
<?php

$args = array(
	'post_type' => 'attachment',
	'post_status' => 'any',
	'tax_query' => array(
		array(
			'taxonomy' => 'media_category', // your taxonomy
			'field' => 'tag_ID',
			'terms' => '28' // term id (id of the media category)
		)
	)
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {?>

<div id="carousel-accueil" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
  <div class="container">
    <div class="bienvenue">BIENVENUE DANS LA
      <h1>
        <?php bloginfo( 'name' ); ?>
      </h1>
    </div>
  </div>
  <?php
		$n=0;
		while ( $the_query->have_posts() ) {
			$n++;
			$the_query->the_post();
			if($n=='1'){?>
  <div class="item active">
    <?
				$nbrSlides = '1';
			}else{ ?>
    <div class="item">
      <?
				$nbrSlides = 'plus';
			}
			echo wp_get_attachment_image( get_the_ID(), 'homepageBanner-size' );?>
    </div>
    <? } ?>
  </div>
  <!-- Controls -->
  <?php if($nbrSlides == 'plus'){ ?>
  <a class="left carousel-control" href="#carousel-accueil" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-accueil" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
  <?php } ?>
</div>
<?php
} else {
	// no attachments found
}
wp_reset_postdata();
?>
<div class="site-inner">
<div class="site-content">
<div class="homepage-content">
<div id="primary" class="">
  <div class="row">
    <div class="col-md-4">
      <div class="site-main">
        <h2>Actualités</h2><?php
		$args=array(
		  'post_status' => 'publish',
		  'posts_per_page' => 3,
		  'caller_get_posts'=> 1,
		   'cat'=>1
		);
		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <?php if ( !in_category( 'presentation' ) ) : ?>
        <div class="post">
          <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a></h3>
          <small><i>Publié le
          <?php the_time('j F Y') ?>
          </i></small>
          <?php if( has_post_thumbnail() ) { ?>
          <div class="homepage-thumb">
            <?php the_post_thumbnail( 'homepage-thumb' ); ?>
          </div>
          <?}?>
          <p>
            <?php the_excerpt(); ?>
          </p>
          <hr>
        </div>
        <?php
			 endif;
			endwhile;
         }

		wp_reset_query();  // Restore global post data stomped by the_post().
       ?>
        <a class="more-articles" href="/category/actualites/"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Toutes les actualités...</a> </div>



        <?php query_posts( 'cat=45' ); ?>
        <?php if ( have_posts() ) : ?>
      <div class="site-main">
        <h2>Travaux</h2>


        <?php while ( have_posts() ) : the_post(); ?>

        <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h3>
          <small><i>Publié le
          <?php the_time('j F Y') ?>
          </i></small>
          <?php if( has_post_thumbnail() ) { ?>
          <div class="homepage-thumb">
            <?php the_post_thumbnail(); ?>
          </div>
          <?}?>
          <p>
            <?php the_excerpt(); ?>
          </p>
          <hr>
        <?php endwhile; ?>
      </div>
		<?php endif; ?>
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil gauche')) : ?>
      <br>
      <?php endif; ?>
    </div>
    <div class="col-md-4">

		      <div class="site-main">
        <h2>Pilier public</h2>
        <?php
		$type = 'pilier_public';
		$args=array(
		  'post_type' => $type,
		  'post_status' => 'publish',
		  'posts_per_page' => 3,
		  'caller_get_posts'=> 1
		);
		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div class="post">
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a></h3>
          <small><i>Publié le
          <?php the_time('j F Y') ?>
          </i></small>
          <?php if( has_post_thumbnail() ) { ?>
          <div class="homepage-thumb">
            <?php the_post_thumbnail( 'homepage-thumb' ); ?>
          </div>
          <?}?>
          <p>
            <?php the_excerpt(); ?>
          </p>
          <hr>
        </div>
        <?php
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>
        <a class="more-articles" href="/pilier_public/"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tous les articles...</a>
        </div>


      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil droite')) : ?>
      <br>
      <?php endif; ?>

        <?php // EMPLOI
		query_posts( 'cat=47' ); ?>
        <?php if ( have_posts() ) : ?>
      <div class="site-main">
        <h2>Emplois</h2>


        <?php while ( have_posts() ) : the_post(); ?>

        <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h3>
          <small><i>Publié le
          <?php the_time('j F Y') ?>
          </i></small>
          <?php if( has_post_thumbnail() ) { ?>
          <div class="homepage-thumb">
            <?php the_post_thumbnail(); ?>
          </div>
          <?}?>
          <p>
            <?php echo get_excerpt(); ?>
          </p>
          <hr>
        <?php endwhile; ?>
      </div>
		<?php endif;
		// END EMPLOI
		?>

    </div>
    <div class="col-md-4">
      <div class="hours widget"><h2>HORAIRES D’OUVERTURE</h2><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Accueil Sidebar')) : ?><?php endif; ?></div>
	<?php
		query_posts( 'cat=24' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		  <div class="site-main site-presentation">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			  <?php the_title(); ?>
			  </a></h2>
			<div class="post">
			  <?php if( has_post_thumbnail() ) { ?>
			  <div class="homepage-thumb">
				<?php the_post_thumbnail(); ?>
			  </div>
			  <?}?>
			  <div class="entry">
				<?php the_content(); ?>
			  </div>
			</div>
		  </div>
        <?php
		endwhile;
		endif;
		wp_reset_query();

		query_posts( 'cat=46' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		  <div class="site-main site-presentation">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			  <?php the_title(); ?>
			  </a></h2>
			<div class="post">
			  <?php if( has_post_thumbnail() ) { ?>
			  <div class="homepage-thumb">
				<?php the_post_thumbnail(); ?>
			  </div>
			  <?}?>
			  <div class="entry">
				<?php the_content(); ?>
			  </div>
			</div>
		  </div>
        <?php
		endwhile;
		endif;
		wp_reset_query();
		?>


      <!--<div class="site-main">
        <h2>MÉTÉO LOCALE</h2>
        <div class="post"><br>
          <div style="width:100%;height:220px;color:#000;border:0; text-align:center">
            <iframe height="190" frameborder="0" width="250" scrolling="no" src="http://www.prevision-meteo.ch/services/html/attalens/square" allowtransparency="true"></iframe>
            <br>
            <a style="text-decoration:none;font-size:0.75em;" title="Prévisions complètes pour Attalens" href="http://www.prevision-meteo.ch/meteo/localite/attalens">Prévisions complètes pour Attalens</a> </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
<?php get_footer(); ?>
