<?php
//enqueue styels
function theme_styles(){
	wp_enqueue_style('project2-style-page', get_stylesheet_directory_uri().'/css/page.css');
    wp_enqueue_style('project2-style', get_stylesheet_directory_uri().'/style.css', array('project2-style-page'));
}
add_action('wp_enqueue_scripts', 'theme_styles');

//enqueue scripts
function theme_scripts(){
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_bloginfo('template_directory').'/js/jquery-1.8.0.min.js');
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('project2-carouFredSel', get_bloginfo('template_directory').'/js/jquery.carouFredSel-5.5.0-packed.js',
		array( 'jquery' ));
	
	wp_enqueue_script('project2-functions', get_bloginfo('template_directory').'/js/functions.js',
		array( 'jquery' ));
}
add_action('wp_enqueue_scripts', 'theme_scripts');

//register menus
register_nav_menus( array(
	'project-top' => 'Project 2 main menu',
	'project-footer' => 'Project 2 footer menu'
) );

//register sidebars
register_sidebar(array(
  'name' => __('Right sidebar'),
  'id' => 'right_sidebar',
  'description' => __('Right Sidebar Widget area'),
  'before_widget' => '<div class="col">',
  'after_widget' => '</div>'
));

register_sidebar(array(
  'name' => __('Search sidebar'),
  'id' => 'search-box',
  'description' => __('Search Widget Area'),
  'before_widget' => '<div class="search">',
  'after_widget' => '</div>'
    ));
	
register_sidebar(array(
	'name' => __('Front Page Featered'),
	'id' => 'featured-sidebar',
	'description' => __('Featered Front Page Widget Area'),
	'before_widget' => '',
	'after_widget' => ''
));
	
register_sidebar(array(
  'name' => __('Front Page One'),
  'id' => 'front-sidebar-one',
  'description' => __('First Front Page Widget Area'),
  'before_widget' => '<div class="col">',
  'after_widget' => '</div>'
    ));
	
register_sidebar(array(
  'name' => __('Front Page Two'),
  'id' => 'front-sidebar-two',
  'description' => __('Second Front Page Widget Area'),
  'before_widget' => '<div class="col">',
  'after_widget' => '</div>'
    ));
	
register_sidebar(array(
  'name' => __('Footer First'),
  'id' => 'ff-widget',
  'description' => __('Footer First Widget Area')
    ));
	
register_sidebar(array(
  'name' => __('Footer Second'),
  'id' => 'fs-widget',
  'description' => __('Footer Second Widget Area'),
  'before_widget' => '<div class="entry">',
  'after_widget' => '</div>'
    ));
	
register_sidebar(array(
  'name' => __('Footer Third'),
  'id' => 'ft-widget',
  'description' => __('Footer Third Widget Area'),
  'before_widget' => '<div class="entry">',
  'after_widget' => '</div>'
    ));
register_sidebar(array(
	'name' => __('Footer Bootom Right'),
	'id' => 'fbr-widget',
	'description' => __('Footer Fourth Widget Area'),
	'before_widget' => '<div class="inline-div">',
	'after_widget' => '</div>'
));
	
//change excerpt's length (20 words long)
function custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "more" with the link "view more"
function new_excerpt_more($more) {
       global $post;
	return '&nbsp;<a class="moretag more" href="'. get_permalink($post->ID) . '">view more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add new post type for Projects
add_action('init', 'projects_init');
function projects_init() 
{
  $project_labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'all_items' => __('All Projects'),
    'add_new' => _x('Add new project', 'projects'),
    'add_new_item' => __('Add new project'),
    'edit_item' => __('Edit project'),
    'new_item' => __('New project'),
    'view_item' => __('View project'),
    'search_items' => __('Search in projects'),
    'not_found' =>  __('No projects found'),
    'not_found_in_trash' => __('No projects found in trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $project_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
    'has_archive' => 'projects'
    
  ); 
  register_post_type('projects',$args);
}

// Add new post type for Jobs
add_action('init', 'jobs_init');
function jobs_init() 
{
  $job_labels = array(
    'name' => _x('Jobs', 'post type general name'),
    'singular_name' => _x('Job', 'post type singular name'),
    'all_items' => __('All Jobs'),
    'add_new' => _x('Add new job', 'jobs'),
    'add_new_item' => __('Add new job'),
    'edit_item' => __('Edit job'),
    'new_item' => __('New job'),
    'view_item' => __('View job'),
    'search_items' => __('Search in jobs'),
    'not_found' =>  __('No jobs found'),
    'not_found_in_trash' => __('No jobs found in trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $job_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 6,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
    'has_archive' => 'jobs'
	
); 
  register_post_type('jobs',$args);
}

//Add custom taxonomies for projects and jobs

add_action( 'init', 'telerik_taxonomies', 0 );

function telerik_taxonomies() 
{
    $tags_labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search in tags' ),
    'popular_items' => __( 'Popular tags' ),
    'all_items' => __( 'All tags' ),
    'most_used_items' => null,
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit tag' ), 
    'update_item' => __( 'Update tag' ),
    'add_new_item' => __( 'Add new tag' ),
    'new_item_name' => __( 'New tag name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
      'add_or_remove_items' => __( 'Add or remove tags' ),
      'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );
  register_taxonomy('tags',array('projects','jobs'),array(
    'hierarchical' => false,
    'labels' => $tags_labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array('slug' => 'tag' )
  ));
  
}

// Add new Custom Post Type icons
add_action( 'admin_head', 'telerik_icons' );
function telerik_icons() {
?>
	<style type="text/css" media="screen">
		#menu-posts-projects .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/project2/css/images/projects_sm.png) no-repeat 6px !important;
		}
		.icon32-posts-projects {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/project2/css/images/projects.png) no-repeat !important;
		}
		#menu-posts-jobs .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/project2/css/images/jobs_sm.png) no-repeat 6px !important;
		}
		.icon32-posts-jobs {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/project2/css/images/jobs.png) no-repeat !important;
		}
    </style>
<?php }

//adding pagination
function paginate() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'plain'
	);
	if( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	if( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	echo paginate_links( $pagination );
}

//add theme support section
add_theme_support( 'post-thumbnails');

add_theme_support( 'automatic-feed-links' );

add_theme_support('custom-background');	

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image' ) );

add_post_type_support( 'page', 'post-formats' );

add_post_type_support( 'jobs', 'post-formats' );

add_post_type_support( 'projects', 'post-formats' );

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '#6522cc',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

//Theme customizer Api - change link color
function project2_customize_register( $wp_customize ){
 
    $wp_customize->add_section('project2_link_color', array(
        'title'    => __('Link Color', 'project2'),
        'priority' => 120
    ));
 
$wp_customize->add_setting( 'link_color' , array(
'default'     => '#6522cc',
'transport'   => 'refresh'
) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'project2'),
        'section'  => 'project2_link_color',
        'settings' => 'link_color'
    )));
}
add_action( 'customize_register', 'project2_customize_register' );
 
function project2_customize_css()
{
    ?>
         <style type="text/css">
a { color:<?php echo get_theme_mod('link_color'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'project2_customize_css');


//custom widget for ad banners
class Custom_Ad_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
		'adaptive_ad_260_w',
		'Custom Ad Widget',
		array('description' =>__('Displays ad with title and image', 'adaptive-famework'))
		);
	}
	public function form($instance) {
		$defaults = array(
			'title' => __('Ad','adaptive-framework'),
			'ad_img' => get_stylesheet_directory_uri().'/css/images',
			'ad_link' => 'http://telerikacademy.com',
		);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
        
        <p><label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'adaptive-framework'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('ad_img') ?>"><?php _e('Ad image', 'adaptive-framework'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('ad_img') ?>" name="<?php echo $this->get_field_name('ad_img') ?>" class="widefat" value="<?php echo esc_attr($instance['ad_img']); ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('ad_link') ?>"><?php _e('Ad link', 'adaptive-framework'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('ad_link') ?>" name="<?php echo $this->get_field_name('ad_link') ?>" class="widefat" value="<?php echo esc_attr($instance['ad_link']); ?>" /></p>
        
	<?php }
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['ad_img'] = strip_tags($new_instance['ad_img']);
		$instance['ad_link'] = strip_tags($new_instance['ad_link']);
		
		return $instance;
	}
	
	public function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget-title', $instance['title']);
		$ad_img = $instance['ad_img'];
		$ad_link = $instance['ad_link'];
		
		echo $before_widget;
		if($title){
			echo $before_title.$title.$after_title;
		}
		if($ad_img){ ?>
            	<figure class="ad-block">
                	<a href="<?php echo $ad_link; ?>" target="_blank"><img src="<?php echo $ad_img; ?>" alt="Ad" /></a>
                </figure>
		<?php }
		echo $after_widget;
	}
}
register_widget('Custom_Ad_Widget');


//style the login
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/css/images/telerik-login.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/css/style-login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//change admin footer text
function remove_footer_admin () {
	echo 'Telerik Academy - CMS Project 2, <a href=\"http://bobbykolev.com\" target=\"_blank\">Bobby Kolev</a> - 2013';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//dashboard widget - info panel
function project2_dashboard_widget_function() {
	// Entering the text between the quotes
	echo "<ul>
	<li>Project: CMS \"Project2\"  Telerik Akademy</li>
	<li>Author: <a href=\"http://bobbykolev.com\" target=\"_blank\">Bobby Kolev</a></li>
	<li>Date created: 6.2013</li>
	<li>Contact: bobbykolev.com@gmail.com</li>
	</ul>";
}
function project2_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Info Box', 'project2_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'project2_add_dashboard_widgets' );

//style the admin - custom admin stylesheet
function admin_css() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

//fix for current class in menu items
// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'projects':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-41', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     		break;

     	case 'jobs':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-42', $classes))
     		{
     		   $classes[] = 'current_page_parent';
               }
     		break;

      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

//escape html in comments
// This will occur when the comment is posted
function plc_comment_post( $incoming_comment ) {
	
// convert everything in a comment to display literally
$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);

$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );

return( $incoming_comment );
}
function plc_comment_display( $comment_to_display ) {
	$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
	return $comment_to_display; 
	}
add_filter( 'preprocess_comment', 'plc_comment_post', '', 1 ); add_filter( 'comment_text', 'plc_comment_display', '', 1 ); add_filter( 'comment_text_rss', 'plc_comment_display', '', 1 ); add_filter( 'comment_excerpt', 'plc_comment_display', '', 1 ); 
remove_filter( 'comment_text', 'make_clickable', 9 ); 
?>