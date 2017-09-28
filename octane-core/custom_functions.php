<?php

/**
 * Octane Custom Functions php
 * Created Casey
 * Date: 2/25/2016
 * Time: 10:55 PM
 */


/**
 * Add your custom function here
 */


function remove_default_genesis_action() {

	//custom theme support
	add_theme_support( 'sensei' );

    
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action( 'genesis_header', 'genesis_do_nav' );
    
    //* Remove the entry header markup (requires HTML5 theme support)
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

    //* Remove the entry meta in the entry header (requires HTML5 theme support)
    remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
    remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

}
add_action('after_setup_theme', 'remove_default_genesis_action');




// check if is the blog page
function is_blog () {
    global  $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}



//* add sub header to sub pages
//  add page title and breadcrumbs
function octane_do_sub_header() {

    if (!is_front_page() && !is_home()) : ?>
       <div class="subpage-header-image"></div>
        <div class="sub-header white-text">
            <div class="wrap">
                <?php
                    genesis_do_post_title();
                    genesis_do_breadcrumbs();
                ?>
            </div>
        </div>
    <?php endif;

}

add_action( 'genesis_before_content_sidebar_wrap', 'octane_do_sub_header' );
