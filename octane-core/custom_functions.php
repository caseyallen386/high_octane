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

function getBusinessPhone() {
    $options = get_option( 'wpseo_local' );
    return isset( $options['location_phone'] ) ? $options['location_phone'] : '999-999-9999';
}

function remove_default_genesis_action() {

	//custom theme support
	add_theme_support( 'sensei' );

    
    //remove the default genesis load styles function
    remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
    //* Remove the entry header markup (requires HTML5 theme support)
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

    //* Remove the entry meta in the entry header (requires HTML5 theme support)
    remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
    

}
add_action('after_setup_theme', 'remove_default_genesis_action');

add_action('get_header', 'remove_admin_login_header');

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
    add_action( 'wp_head', 'custom_adminbar_css');

    function custom_adminbar_css() { ?>

        <style>
            #wpadminbar {

                position: fixed;
                overflow: hidden;
                width: 34px;
                min-width: 0;
                -webkit-transition: all 200ms;
                -o-transition: all 200ms;
                transition: all 200ms;
            }

            #wpadminbar:hover {
                position: fixed;
                width: 100%;
                opacity: 1;
                height: 45px;
                padding: 5px;
                overflow: initial;
            }
        </style>

    <?php
    }
}




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

