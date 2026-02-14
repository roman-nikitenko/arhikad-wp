<?php
/**
 * Arhikad Theme Functions
 *
 * @package Arhikad
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Replace the version number of the theme on each release.
if ( ! defined( 'THEME_VERSION' ) ) {
	define( 'THEME_VERSION', wp_get_theme()->Version );
}

/**
 * Theme setup and support
 */
function arhikad_setup() {
	// Add theme support for navigation menus.
	add_theme_support( 'nav-menus' );

	// Register navigation menu locations.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'arhikad' ),
			'footer'  => __( 'Footer Menu', 'arhikad' ),
		)
	);
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 16,
			'width'       => 16,
			'flex-width'  => true,
			'flex-height' => true,
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
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'arhikad_setup' );

/**
 * Enqueue scripts and styles
 */
function arhikad_scripts() {
	wp_enqueue_style( 'arhikad-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'arhikad_scripts' );

add_filter(
	'wp_nav_menu',
	function ( $ul ) {
			return str_replace(
				'<ul id="main-menu" class="primary-menu"',
				'<ul id="main-menu" class="primary-menu" data-nav="' . esc_html( 'Navigation' ) . '"',
				$ul
			);
	},
	10,
	2
);

/**
 * Enqueue theme styles
 */
function arhikad_enqueue_styles() {
	wp_enqueue_style( 'arhikad-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'arhikad_enqueue_styles' );

/**
 * Enqueue theme scripts
 */
function arhikad_enqueue_scripts() {
	wp_enqueue_script( 'arhikad-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'arhikad_enqueue_scripts' );

add_action(
	'after_setup_theme',
	function () {
		add_editor_style( 'assets/css/gutenberg/editor-styles.css' );
		add_editor_style( 'assets/css/gutenberg/opti-gutenberg.css' );
	}
);

/**
 * Register custom blocks (so they appear in the block editor / admin).
 */
function arhikad_register_blocks() {
	$block_dirs = array(
		get_template_directory() . '/gb-blocks/latest-project/latest-project.php',
	);

	foreach ( $block_dirs as $block_file ) {
		if ( file_exists( $block_file ) ) {
			require_once $block_file;
		}
	}
}
add_action( 'after_setup_theme', 'arhikad_register_blocks' );

function get_project_icon( $icon_name ) {
	$icons = array(
		'сonstruction'   => get_template_directory_uri() . '/assets/images/construction.svg',
		'design'         => get_template_directory_uri() . '/assets/images/design.svg',
		'reconstruction' => get_template_directory_uri() . '/assets/images/reconstruction.svg',
	);

	return $icons[ $icon_name ];
}
