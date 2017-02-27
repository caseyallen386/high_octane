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

    $header = 'a1';

    // call the header layout
    // call the header layout

    call_user_func( "{$header}_header" );

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

function add_custom_role() {
    add_role( 'employee', 'Employee', array( 'read' => true, 'level_0' => true ) );
    add_role( 'employer', 'Employer', array( 'read' => true, 'level_0' => true ) );
}
//add_custom_role();

//function testing_something() {
//	$c_user =  wp_get_current_user();
//	$user_meta = get_user_meta($c_user->ID);
//	echo '<pre>';
//	var_dump($user_meta);
//	echo '</pre>';
//}
//
//
//add_action( 'genesis_entry_content', 'testing_something');

function a1_header() {

    function a1_header_widgets() {
        genesis_register_sidebar( array(
            'id'          => 'a1-topbar-right',
            'name'        => __( 'Top Bar Right', 'octane' ),
            'description' => __( 'Right side of the topbar', 'octane' ),
        ) );
        genesis_register_sidebar( array(
            'id'          => 'a1-topbar-left',
            'name'        => __( 'Top Bar Left', 'octane' ),
            'description' => __( 'Left side of the topbar', 'octane' ),
        ) );
    }
    add_action( 'widgets_init', 'a1_header_widgets' );

    function a1_header_topbar() {

        $styles = str_replace( array("\n", "\r"), '', file_get_contents( dirname(__file__). '/css/header-a1.css') ) ;
        printf('<style>%s</style>', $styles);
        ?>
            <div class="a1-topbar">
                <div class="wrap">
                    <?php
                        genesis_widget_area( 'a1-topbar-right', array(
                            'before' => '<div class="a1-right-widget">',
                            'after'  => '</div>'
                        ) );
                        genesis_widget_area( 'a1-topbar-left', array(
                            'before' => '<div class="a1-left-widget">',
                            'after'  => '</div>'
                        ) );
                    ?>
                </div>
            </div>
        <?php

    }

    add_action( 'genesis_before_header',  'a1_header_topbar');


	remove_action( 'genesis_after_header', 'genesis_do_nav');
	add_action( 'genesis_header', 'genesis_do_nav');
}

function a2_header() {

    remove_action( 'genesis_after_header', 'genesis_do_subnav' );

    function a2_header_widgets() {

        genesis_register_sidebar( array(
            'id'          => 'a2-topbar-left',
            'name'        => __( 'Top Bar Left', 'octane' ),
            'description' => __( 'Left side of the topbar', 'octane' ),
        ) );
    }
    add_action( 'widgets_init', 'a2_header_widgets' );

    function a2_header_topbar() {

        $styles = str_replace( array("\n", "\r"), '', file_get_contents( dirname(__file__). '/css/header-a2.css') ) ;
        printf('<style>%s</style>', $styles);
        ?>
            <div class="a2-topbar">
                <div class="wrap">
                    <?php
                        genesis_do_subnav();
                        genesis_widget_area( 'a2-topbar-left', array(
                            'before' => '<div class="a2-left-widget">',
                            'after'  => '</div>'
                        ) );
                    ?>
                </div>
            </div>
        <?php

    }

    add_action( 'genesis_before_header',  'a2_header_topbar');



}

function a3_header() {
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );

    function a3_header_widgets() {



        genesis_register_sidebar( array(
            'id'          => 'a3-topbar-left',
            'name'        => __( 'Top Bar Left', 'octane' ),
            'description' => __( 'Left side of the topbar', 'octane' ),
        ) );
    }
    add_action( 'widgets_init', 'a3_header_widgets' );

    function a3_header_topbar() {

        $styles = str_replace( array("\n", "\r"), '', file_get_contents( dirname(__file__). '/css/header-a3.css') ) ;
        printf('<style>%s</style>', $styles);
        ?>
            <div class="a3-topbar">
                <div class="wrap">
                    <?php
                        genesis_do_subnav();
                        genesis_widget_area( 'a3-topbar-left', array(
                            'before' => '<div class="a3-left-widget">',
                            'after'  => '</div>'
                        ) );
                    ?>
                </div>
            </div>
        <?php

    }

    add_action( 'genesis_before_header',  'a3_header_topbar');
}

function a4_header() {
	remove_action('genesis_after_header', 'genesis_do_nav');
	add_action('genesis_header', 'genesis_do_nav');

	function a4_title_wrap() {
		?>
			<script type="text/javascript">
				(function($) {
						$('.title-area, .header-widget-area').wrapAll( $('<div>').addClass('title-wrap') );
				 })(jQuery);
			</script>
		<?php
	}

	function a4_header_styles() {

        $styles = str_replace( array("\n", "\r", "\t", "  "), '', file_get_contents( dirname(__file__). '/css/header-a4.css') ) ;
        printf('<style>%s</style>', $styles);

    }
	add_action('genesis_after_footer', 'a4_title_wrap');
	add_action('genesis_before_header', 'a4_header_styles');
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

function octane_register_new_user() {
	// wp_create_user( $username, $password, $email )

    /*

    wp_insert_user( $userdata );
    Array Fields
    ID	            An integer that will be used for updating an existing user.	(none)
    user_pass	    A string that contains the plain text password for the user.	pre_user_pass
    user_login	    A string that contains the user's username for logging in.	pre_user_login
    user_nicename	A string that contains a URL-friendly name for the user. The default is the user's username.	pre_user_nicename
    user_url		A string containing the user's URL for the user's web site.	pre_user_url
    user_email		A string containing the user's email address.	pre_user_email
    display_name	A string that will be shown on the site. Defaults to user's username. It is likely that you will want to change this, for both appearance and security
                    through obscurity (that is if you dont use and delete the default admin user).	pre_user_display_name
    nickname		The user's nickname, defaults to the user's username.	pre_user_nickname
    first_name		The user's first name.	pre_user_first_name
    last_name		The user's last name.	pre_user_last_name
    description		A string containing content about the user.	pre_user_description
    rich_editing	A string for whether to enable the rich editor or not. False if not empty.	(none)
    user_registered	The date the user registered. Format is Y-m-d H:i:s.	(none)
    role			A string used to set the user's role.	(none)
    jabber			User's Jabber account.	(none)
    aim				User's AOL IM account.	(none)
    yim				User's Yahoo IM account.	(none)


    update_user_meta( int $user_id, string $meta_key, mixed $meta_value, mixed $prev_value = '' )

    */




}
