<?php


class High_Octane {

  public function __construct() {}

  public function init() {

    //remove the default genesis load styles function
    remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
    add_action( 'genesis_after', 'wp_print_scripts' );
    add_action( 'genesis_after', 'wp_print_head_scripts', 9);
    add_action( 'genesis_after', 'wp_enqueue_scripts', 1 );

    //actions
    add_action( 'after_setup_theme', array( $this ,'octane_setup' ) );
    add_action( 'widgets_init', array( $this, 'octane_widgets_init' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'octane_scripts' ) );


    //filters
    add_filter( 'script_loader_src', array( $this, '_remove_script_version' ), 15, 1 );
    add_filter( 'style_loader_src', array( $this, '_remove_script_version' ), 15, 1 );



  }

  function octane_widgets_init() {
      //* Register widget areas

  }

  public function octane_setup() {
      //* Define Genesis Child theme
      define( 'CHILD_THEME_NAME', __( 'High_Octane Theme', 'octane' ) );
      define( 'CHILD_THEME_URL', 'http://performancedrivenmarketing.com' );
      define( 'CHILD_THEME_VERSION', '1.0' );

      //Load genesis
      require_once( get_template_directory() . '/lib/init.php' );



      // Add default posts and comments RSS feed links to head.
      add_theme_support( 'automatic-feed-links' );

      //* Add viewport meta tag for mobile browsers
      add_theme_support( 'genesis-responsive-viewport' );


      /*
       * Let WordPress manage the document title.
       * By adding theme support, we declare that this theme does not use a
       * hard-coded <title> tag in the document head, and expect WordPress to
       * provide it for us.
       */
      add_theme_support( 'title-tag' );

      /*
       * Enable support for Post Thumbnails on posts and pages.
       *
       * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
       */
      add_theme_support( 'post-thumbnails' );

      // This theme uses wp_nav_menu() in one location.
      register_nav_menus( array(
          'primary' => esc_html__( 'Primary', 'octane' )
      ) );

      /*
       * Switch default core markup for search form, comment form, and comments
       * to output valid HTML5.
       */
      add_theme_support( 'html5', array(
          'search-form',
          'comment-form',
          'comment-list',
          'gallery',
          'caption',
      ) );

      /*
       * Enable support for Post Formats.
       * See https://developer.wordpress.org/themes/functionality/post-formats/
       */
      add_theme_support( 'post-formats', array(
          'aside',
          'image',
          'video',
          'quote',
          'link',
      ) );


      //* Add support for custom header
      add_theme_support( 'custom-header', array(
          'header-selector' => '.site-title a',
          'header-text'     => false,
          'height'          => 111,
          'width'           => 340,
      ) );

//* Add support for custom background
      add_theme_support( 'custom-background' );

//* Add support for structural wraps
      add_theme_support( 'genesis-structural-wraps', array(
          'header',
        //   'nav',
          'subnav',
          'site-inner',
          'footer-widgets',
          'footer',
      ) );

//* Add support for after entry widget
      add_theme_support( 'genesis-after-entry-widget-area' );
//* Add support for 4-column footer widgets
      add_theme_support( 'genesis-footer-widgets', 4 );

      //* Add new image sizes
      add_image_size( 'home-top', 1140, 460, TRUE );
      add_image_size( 'home-bottom', 285, 160, TRUE );
      add_image_size( 'sidebar', 300, 150, TRUE );


      //remove the default genesis load styles function
      remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
      //* Remove the entry header markup (requires HTML5 theme support)
      remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
      remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

      //* Remove the entry meta in the entry header (requires HTML5 theme support)
      remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
      remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
      remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
  }

  function getBusinessPhone() {
      $options = get_option( 'wpseo_local' );
      return isset( $options['location_phone'] ) ? $options['location_phone'] : '999-999-9999';
  }

  function _remove_script_version( $src ){
  	if (!preg_match('/fonts.googleapis/', $src)){
          $parts = explode( '?', $src );
  	   return $parts[0];
      } else {
          return $src;
      }
  }

  

  function octane_scripts() {
      
      wp_enqueue_script( 'octane-scripts', get_stylesheet_directory_uri(). '/js/octane.js', array( 'jquery'), '1.0', true);

      wp_enqueue_style( 'dashicons' );

      wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', array(), CHILD_THEME_VERSION );

      wp_enqueue_style( 'octane-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), CHILD_THEME_VERSION );

  }

}
