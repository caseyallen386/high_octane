<?php

// Force full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

function octane_body_class( $classes ) {

    $classes[] = 'high-octane-home';
    return $classes;

}
add_filter( 'body_class', 'octane_body_class' );

// function homepage_slider() {

// }

function do_homepage() {
?>
<div class="hero">
<h2>Casey Allen</h2>
<p>Web Development Specialist</p>
</div>


<?php
}
// add_action( 'genesis_after_header', 'homepage_slider', 20 );

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'do_homepage' );

genesis();
