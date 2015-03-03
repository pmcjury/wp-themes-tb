<?php

/**
 * Football Club functions and definitions
 *
 * @package WordPress
 * @subpackage Football Club
 * @since Football Club 2.0
 */

// translations
load_theme_textdomain( 'themeboy', TEMPLATEPATH . '/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . '/languages/$locale.php';
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

// defaults
require_once('inc/defaults.php');

// helpers
require_once('inc/helpers.php');
require_once('inc/helpers-club.php');
require_once('inc/helpers-player.php');
require_once('inc/helpers-match.php');

// ajax
include_once( 'inc/ajax-club_buttons.php' );
include_once( 'inc/ajax-players_table.php' );
include_once( 'inc/ajax-match_shortcode.php' );
include_once( 'inc/ajax-fixtures_shortcode.php' );
include_once( 'inc/ajax-results_shortcode.php' );
include_once( 'inc/ajax-standings_shortcode.php' );
include_once( 'inc/ajax-player_shortcode.php' );
include_once( 'inc/ajax-players_shortcode.php' );
include_once( 'inc/ajax-staff_shortcode.php' );
include_once( 'inc/ajax-rotator_shortcode.php' );
include_once( 'inc/ajax-contact_shortcode.php' );
include_once( 'inc/ajax-map_shortcode.php' );

// shortcodes
require_once( 'inc/shortcode-contact.php' );
require_once( 'inc/shortcode-fixtures.php' );
require_once( 'inc/shortcode-map.php' );
require_once( 'inc/shortcode-match.php' );
require_once( 'inc/shortcode-player.php' );
require_once( 'inc/shortcode-players.php' );
require_once( 'inc/shortcode-results.php' );
require_once( 'inc/shortcode-rotator.php' );
require_once( 'inc/shortcode-sponsors.php' );
require_once( 'inc/shortcode-staff.php' );
require_once( 'inc/shortcode-standings.php' );
require_once( 'inc/shortcode-tinymce.php' );

// setup
require_once('inc/setup.php');

// customize
require_once('inc/customize.php');

// theme options
include_once( 'inc/themeboy-general.php' );
include_once( 'inc/themeboy-social.php' );
include_once( 'inc/themeboy-rotator.php' );
include_once( 'inc/themeboy-team.php' );
include_once( 'inc/themeboy-standings.php' );
include_once( 'inc/themeboy-matches.php' );
include_once( 'inc/themeboy-contact.php' );
include_once( 'inc/themeboy-customize.php' );
include_once( 'inc/themeboy-advanced.php' );
include_once( 'inc/themeboy-reset.php' );
include_once( 'inc/themeboy-adminbar.php' );

// post types
require_once('inc/post-type-club.php');
require_once('inc/post-type-player.php');
require_once('inc/post-type-staff.php');
require_once('inc/post-type-match.php');
require_once('inc/post-type-sponsor.php');

// taxonomies
require_once('inc/taxonomy-comp.php');
require_once('inc/taxonomy-venue.php');
require_once('inc/taxonomy-season.php');
require_once('inc/taxonomy-team.php');
require_once('inc/taxonomy-position.php');

// widgets
include_once('inc/widget-fixtures.php');
include_once('inc/widget-results.php');
include_once('inc/widget-standings.php');
include_once('inc/widget-facebook.php');
include_once('inc/widget-twitter.php');
include_once('inc/widget-image.php');
include_once('inc/widget-ground.php');

// sidebars
require_once('inc/sidebars.php');

// scripts
include('inc/enqueue-scripts.php');

// styles
include('inc/enqueue-styles.php');
include('inc/custom-styles.php');

function get_bootstrapped(){
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.1', true );

	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.1', 'all' );

	wp_enqueue_script( 'bootstrap-js' );

	wp_enqueue_style( 'bootstrap-css' );
}

add_action('wp_enqueue_scripts', 'get_bootstrapped');

add_action( 'init', 'register_cpt_boxing' );

function register_cpt_boxing() {

    $labels = array(
        'name' => _x( 'boxing', 'boxing' ),
        'singular_name' => _x( 'boxing', 'boxing' ),
        'all_items'           => __( 'All Boxing Matches', 'boxing' ),
        'add_new' => _x( 'Add New', 'boxing' ),
        'add_new_item' => _x( 'Add New boxing', 'boxing' ),
        'edit_item' => _x( 'Edit Boxing Match', 'boxing' ),
        'new_item' => _x( 'New Boxing Match', 'boxing' ),
        'view_item' => _x( 'View Boxing Match', 'boxing' ),
        'search_items' => _x( 'Search Boxing Matches', 'boxing' ),
        'not_found' => _x( 'No Boxing Matches found', 'boxing' ),
        'not_found_in_trash' => _x( 'No boxing found in Trash', 'boxing' ),
        'parent_item_colon' => _x( 'Parent boxing:', 'boxing' ),
        'menu_name' => _x( 'Boxing Matches', 'boxing' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,

		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'comments' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'public'              => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'boxing', $args );
};

	add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

	function cmb_sample_metaboxes( array $meta_boxes ) {

	  // Start with an underscore to hide fields from custom fields list
	  $prefix = '_cmb_';

	  /**
	   * Sample metabox to demonstrate each field type included
	   */
	  $meta_boxes['boxer_one_metabox'] = array(
	    'id'         => 'boxer_one_metabox',
	    'title'      => __( 'Boxer One', 'cmb' ),
	    'pages'      => array( 'boxing' ), // Post type
	    'context'    => 'normal',
	    'priority'   => 'high',
	    'show_names' => true, // Show field names on the left
	    // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
	    'fields'     => array(
	            array(
				    'name' => 'Height',
				    'id' => $prefix . 'height',
				    'type' => 'text'
				),
				array(
				    'name' => 'Name',
				    'id' => $prefix . 'name',
				    'type' => 'text'
				),
				array(
				    'name' => 'Weight',
				    'id' => $prefix . 'weight',
				    'type' => 'text'
				),
				array(
				    'name' => 'Hometown',
				    'id' => $prefix . 'hometown',
				    'type' => 'text'
				),
				array(
				    'name' => 'Occupation',
				    'id' => $prefix . 'occupation',
				    'type' => 'text'
				),
				array(
				    'name' => 'Position',
				    'id' => $prefix . 'position',
				    'type' => 'text'
				),
				array(
				    'name' => 'Bio',
				    'desc' => 'Enter Boxers Bio',
				    'id' => $prefix . 'bio',
				    'type' => 'wysiwyg',
				    'options' => array(),
				),
				array(
				    'name' => 'Headshot',
				    'desc' => 'Upload Boxer Picture',
				    'id' => $prefix . 'headshot',
				    'type' => 'file',
				    'allow' => array( 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
	        ),
	    );

	    return $meta_boxes;
	}

	add_filter( 'cmb_meta_boxes', 'cmb_boxers_metaboxes' );

	function cmb_boxers_metaboxes( array $meta_boxes ) {

	  // Start with an underscore to hide fields from custom fields list
	  $prefix = '_cmb_';

	  /**
	   * Sample metabox to demonstrate each field type included
	   */
	  $meta_boxes['boxer_two_metabox'] = array(
	    'id'         => 'boxer_two_metabox',
	    'title'      => __( 'Boxer Two', 'cmb' ),
	    'pages'      => array( 'boxing' ), // Post type
	    'context'    => 'normal',
	    'priority'   => 'high',
	    'show_names' => true, // Show field names on the left
	    // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
	    'fields'     => array(
	            array(
				    'name' => 'Height',
				    'id' => $prefix . 'height_two',
				    'type' => 'text'
				),
				array(
				    'name' => 'Name',
				    'id' => $prefix . 'name_two',
				    'type' => 'text'
				),
				array(
				    'name' => 'Weight',
				    'id' => $prefix . 'weight_two',
				    'type' => 'text'
				),
				array(
				    'name' => 'Hometown',
				    'id' => $prefix . 'hometown_two',
				    'type' => 'text'
				),
				array(
				    'name' => 'Occupation',
				    'id' => $prefix . 'occupation_two',
				    'type' => 'text'
				),array(
				    'name' => 'Position',
				    'id' => $prefix . 'position_two',
				    'type' => 'text'
				),
				array(
				    'name' => 'Bio',
				    'desc' => 'Enter Boxers Bio',
				    'id' => $prefix . 'bio_two',
				    'type' => 'wysiwyg',
				    'options' => array(),
				),
				array(
				    'name' => 'Headshot',
				    'desc' => 'Upload Boxer Picture',
				    'id' => $prefix . 'headshot_two',
				    'type' => 'file',
				    'allow' => array( 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
	        ),
	    );

	    return $meta_boxes;
	}

	add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
	/**
	 * Initialize the metabox class.
	 */
	function cmb_initialize_cmb_meta_boxes() {

	  if ( ! class_exists( 'cmb_Meta_Box' ) )
	    require_once 'Custom-Metaboxes-and-Fields-for-WordPress-master/init.php';

	}



?>