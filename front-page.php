<?php

// Force full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

function octane_body_class( $classes ) {

    $classes[] = 'high-octane-home';
    return $classes;

}
add_filter( 'body_class', 'octane_body_class' );

function homepage_slider() {


	if ( function_exists( 'soliloquy' ) ) {
    printf( '<link href="%s" rel="stylesheet" media="screen" title="no title">', get_stylesheet_directory_uri() .'/css/home-slider.css' );
    soliloquy( get_field('slider') );
  }
}

function do_homepage() {

// $layout = new layout();
//
// $layout->full_width( array(
//   'h1' => 'Testing layout function',
//   'p' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
//
//  ), 'hero-section' );
// $layout->do_columns( array(
//   array(
//     'class' => 'one-third',
//     'inner' => array(
//         'h2' => 'Cool Title',
//         'p' => 'lkj;lkjdfi ;lkjadsfoij ;lkj ;adslfij ;lkdjf oijads ;lkjasdf ;lkjasf'
//     )
//   ),
//   array(
//     'class' => 'one-third',
//     'inner' => array(
//       'h2' => 'Cool Title',
//       'p' => 'lkj;lkjdfi ;lkjadsfoij ;lkj ;adslfij ;lkdjf oijads ;lkjasdf ;lkjasf'
//     )
//   ),
//   array(
//     'class' => 'one-third',
//     'inner' => array(
//       'h2' => 'Cool Title',
//       'p' => 'lkj;lkjdfi ;lkjadsfoij ;lkj ;adslfij ;lkdjf oijads ;lkjasdf ;lkjasf'
//     )
//   )
// ),
//   'buckets'
// );




}
// add_action( 'genesis_after_header', 'homepage_slider', 20 );

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'do_homepage' );

genesis();
