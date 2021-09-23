<?php
/**
 * Twenty Sixteen Child functions and definitions
 **/


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'twentysixteen', get_template_directory_uri() . '/style.css' );

}
function codex_custom_init() {

	register_post_type(
		'pilier_public',
			array(
				'label' => 'Articles du pilier public',
				'singular_label' => 'Article du pilier public',
				'labels' => array(
					'menu_name' => 'Pilier public',
					'all_items' => 'Tous les articles du pilier public',
					'add_new' => 'Ajouter un nouvel article',
					'add_new_item' => 'Ajouter un nouvel article du pilier public',
					'edit_item' => 'Modifier l\'article du pilier public',
					'new_item' => 'Nouvel article du pilier public',
					'view_item' => 'Voir l\'article du pilier public',
					'search_items' => 'Rechercher l\'article du pilier public',
					'not_found' => 'Aucun article du pilier public trouvé',
					'not_found_in_trash'=> 'Aucun article du pilier public trouvé dans la corbeille',
					'parent' => 'Article du pilier public parent',
				),
				'public' => true,
				'capability_type' => 'post',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'custom-fields'
				),
				'has_archive' => true,
        'menu_position' => 5
			)
	   );

	/*register_post_type(
		'dicasteres',
			array(
				'label' => 'Dicastères',
				'singular_label' => 'Dicastère',
				'labels' => array(
					'menu_name' => 'Dicastères',
					'all_items' => 'Tous les dicastères',
					'add_new' => 'Ajouter un nouveau dicastère',
					'add_new_item' => 'Ajouter un nouveau dicastère',
					'edit_item' => 'Modifier les dicastères',
					'new_item' => 'Nouveau dicastère',
					'view_item' => 'Voir les dicastères',
					'search_items' => 'Rechercher les dicastères',
					'not_found' => 'Aucun dicastère trouvé',
					'not_found_in_trash'=> 'Aucun dicastère trouvé dans la corbeille',
					'parent' => 'Dicastère parent',
				),
				'public' => true,
				'capability_type' => 'post',
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'custom-fields'
				),
				'has_archive' => true,
        'menu_position' => 6
			)
    );*/

  register_taxonomy(
  'pilier_public_categorie',
  'pilier_public',
   array(
     'label' => 'Catégories',
     'labels' => array(
       'name' => 'Catégories',
       'singular_name' => 'Catégorie',
       'all_items' => 'Toutes les catégories',
       'edit_item' => 'Éditer la catégorie',
       'view_item' => 'Voir la catégorie',
       'update_item' => 'Mettre à jour la catégorie',
       'add_new_item' => 'Ajouter une catégorie',
       'new_item_name' => 'Nouvelle catégorie',
       'search_items' => 'Rechercher parmi les catégories',
       'popular_items' => 'Catégories les plus utilisées'
     ),
     'hierarchical' => true
   )
 );
  /*register_taxonomy(
  'dicastere_categorie',
  'dicastere',
   array(
     'label' => 'Catégories',
     'labels' => array(
       'name' => 'Catégories',
       'singular_name' => 'Catégorie',
       'all_items' => 'Toutes les catégories',
       'edit_item' => 'Éditer la catégorie',
       'view_item' => 'Voir la catégorie',
       'update_item' => 'Mettre à jour la catégorie',
       'add_new_item' => 'Ajouter une catégorie',
       'new_item_name' => 'Nouvelle catégorie',
       'search_items' => 'Rechercher parmi les catégories',
       'popular_items' => 'Catégories les plus utilisées'
     ),
     'hierarchical' => true
   )
 );*/
  register_taxonomy_for_object_type( 'pilier_public_categorie', 'pilier_public' );
  //register_taxonomy_for_object_type( 'dicastere_categorie', 'dicastere' );
}

add_action('init', 'codex_custom_init');

add_image_size( 'homepage-thumb', 400, 150, true ); //300 pixels wide
add_image_size( 'insideBanner-size', 1200, 270, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size( 'homepageBanner-size', 1200, 400, true ); // 220 pixels wide by 180 pixels tall, hard crop mode

add_image_size( 'personnel-size', 400, 9999); // 220 pixels wide by 180 pixels tall, hard crop mode

function document_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	return '<div class="document">
            <h3 class="document__title">' . $titre . '</h3>
            <div class="document__content">' . $content . '</div>
          </div>';
}
add_shortcode( 'document', 'document_shortcode' );


function photo_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</div>';
	return $output;
		  
}
add_shortcode( 'photo', 'photo_shortcode' );

function lien_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '','lien' => ''), $atts ) );
	$output = '<div class="carte">';
	$output .= '<a href="'. $lien .'">';
	$output .= ' <h3 class="carte__title">' . $titre . '</h3>';
	$output .= ' <div class="carte__content">' . $content . '</div>';
	$output .= '</a>';
	$output .= '</div>';
	return $output;
		  
}
add_shortcode( 'lien', 'lien_shortcode' );


function portrait_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'titre' => '', 'description' => ''), $atts ) );
	return '<div class="portrait-img">
            <div class="portrait__image"></div>
            <h3 class="portrait__title">' . $titre . '</h3>
            <div class="portrait__content">' . $content . '
            </div>
          </div>';
}
add_shortcode( 'portrait', 'portrait_shortcode' );




if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Accueil gauche',
		'id' => 'accueil_gauche',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Accueil droite',
		'id' => 'accueil_droite',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Accueil Sidebar',
		'id' => 'accueil_sidebar',
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="offscreen">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 1',
		'id' => 'bas1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 2',
		'id' => 'bas2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Contenu du bas 3',
		'id' => 'bas3',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );


// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
  global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lire la suite...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Lire la suite...</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


/**
 * change tinymce's paste-as-text functionality
 */
function change_paste_as_text($mceInit, $editor_id){
	//turn on paste_as_text by default
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit['paste_as_text'] = true;
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'change_paste_as_text', 1, 2);
update_option('image_default_link_type','');


function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 100);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.'... <a href="' . get_permalink() . '">Continuer la lecture</a>';
	return $excerpt;
}

function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
 background-image: url(https://www.attalens.ch/wp-content/themes/twentysixteen-child/images/armoiries_attalens.png);  //Add your own logo image in this url 
padding-bottom: 30px; 
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );




// Function to change email address
 
function wpb_sender_email( $original_email_address ) {
    return 'administration@attalens.ch';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'Commune d\'Attalens';
}
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

//Remove JQuery migrate
 
function remove_jquery_migrate( $scripts ) {
   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
   if ( $script->deps ) { 
// Check whether the script has any dependencies

        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 }
 }
 }
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );