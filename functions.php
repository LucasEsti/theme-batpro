<?php

require( dirname( __FILE__ ) . '/navwalker.php' );
if ( ! function_exists( 'batpro_setup' ) ) :
	function batpro_setup() {
		load_theme_textdomain( 'batpro' );
		add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'batpro' ),
                'social'  => __( 'Social ', 'batpro' ),
                'footer'  => __( 'Footer', 'batpro' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
	}
endif; // batpro_setup
add_action( 'after_setup_theme', 'batpro_setup' );

function custom_admin_post_thumbnail_html( $content ) {
    return $content = str_replace( __( 'Set featured image' ), __( 'Set default image' ), $content); 
}
add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );

function batpro_scripts() {
// Theme stylesheet.
//wp_enqueue_style( 'batpro-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0' );
//wp_enqueue_style( 'batpro-all', get_template_directory_uri() . '/css/all.min.css', array(), '1.0' );
// wp_enqueue_style( 'batpro-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '1.0' );
//wp_enqueue_style( 'batpro-aos', get_template_directory_uri() . '/css/aos.css', array(), '1.0' );

//wp_enqueue_style( 'batpro-slick', get_template_directory_uri() . '/css/slick.css', array(), '1.0' );

wp_enqueue_style( 'batpro-style', get_stylesheet_uri() );
wp_enqueue_style( 'batpro-mainstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0' );
wp_enqueue_style( 'batpro-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'batpro_scripts' );

// custom excerpt
function the_excerpt_limit($max_char) {
    $content = get_the_excerpt();
    $content = str_replace(']]>', ']]&gt;', $content);

   if (strlen($_GET['p']) > 0) {
      echo "<p>".$content."</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>".$content."...</p>";
   }
   else {
      echo $content;
   }
}


add_action('init', 'produits');
function produits()	{
	 register_post_type('produits', array(
	 'label' => __('Nos produits'),
	 'singular_label' => __('produits'),
	 'public' => true,
	 'show_ui' => true,
	 'capability_type' => 'post',
	 'hierarchical' => true,
	 'has_archive' => false,
	 'menu_icon' => 'dashicons-store',
	 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	 'rewrite'  => array( 'slug' => 'produits' )
	));
	register_taxonomy('nos-produits', 'produits category', array(
        'hierarchical'          => true,
        'labels'                => array(
            'name'                       => _x('Categorie des produits', 'taxonomy general name', 'guru'),
            'singular_name'              => _x('Categorie', 'taxonomy singular name', 'guru'),
            'search_items'               => __('Search Category', 'guru'),
            'popular_items'              => __('Popular Category', 'guru'),
            'all_items'                  => __('All Category', 'guru'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __('Edit category', 'guru'),
            'update_item'                => __('Update category', 'guru'),
            'add_new_item'               => __('Add New category', 'guru'),
            'new_item_name'              => __('New category Name', 'guru'),
            'separate_items_with_commas' => __('Separate Category with commas', 'guru'),
            'add_or_remove_items'        => __('Add or remove Category', 'guru'),
            'choose_from_most_used'      => __('Choose from the most used Category', 'guru'),
            'not_found'                  => __('No Category found.', 'guru'),
            'menu_name'                  => __('Categories', 'guru'),
        ),
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'  => array( 'slug' => 'nos-produits' )
    ));
    register_taxonomy_for_object_type('nos-produits', 'produits');
}
// team
add_action('init', 'equipes');
function equipes(
)	{
	 register_post_type('equipes', array(
	 'label' => __('Equipes'),
	 'singular_label' => __('Equipes'),
	 'public' => true,
	 'show_ui' => true,
	 'capability_type' => 'post',
	 'taxonomies' => array( 'category', 'post_tag' ),
	 'hierarchical' => false,
	 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	 'menu_icon' => 'dashicons-admin-users'
	));
}

// get current Cat
function getCurrentCatID(){
	global $wp_query;
	if(is_category() || is_single()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


// remove menu

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
  global $user_ID;
  if ( $user_ID != 1 ) { //your user id
	remove_menu_page('index.php'); // tableau de bord
   remove_menu_page('edit.php'); // Posts
   remove_menu_page('upload.php'); // Media
   remove_menu_page('link-manager.php'); // Links
   remove_menu_page('edit-comments.php'); // Comments
   remove_menu_page('edit.php?post_type=page'); // Pages
   remove_menu_page('plugins.php'); // Plugins
   remove_menu_page('themes.php'); // Appearance
   remove_menu_page('users.php'); // Users
   remove_menu_page('edit.php?post_type=equipes'); // custom post equipes
   remove_menu_page('tools.php'); // Tools
   remove_menu_page('options-general.php'); // Settings
   remove_menu_page('upload.php'); // Media


  }
}
function admin_default_page() {
   return 'wp-admin/edit.php?post_type=produits'; //your redirect URL
}
add_filter('login_redirect', 'admin_default_page');


// Site option
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site options',
		'menu_title' 	=> 'Site options',
		'menu_slug' 	=> 'site_options',
		'capability' 	=> 'edit_posts',
		'position' => 4,
		'redirect'		=> false,
	));
}


add_filter( 'gform_field_value_produits', 'populate_list' );
function populate_list( $value ) {
    global $BPCart;
    
    foreach ($BPCart->items() as $product) {
        $list_array[] = array(
            'id' => $product->extra["id"],            'nom' => $product->name,            'reference' => $product->extra["ref"],            'marque' => get_field( 'marques', $product->extra["id"] ),            'quantité' => $product->quantity,            'déclinaison' => $product->extra["declinaison"],
        );
    }

    return $list_array;
}

add_action( 'pre_get_posts', 'change_product_archive_order' );
function change_product_archive_order ( $query ) {
    if (($query->is_main_query()) && (is_tax('nos-produits'))){
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }

}
