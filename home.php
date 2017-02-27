<?php
/**
 * Template Name: Blog
 * Description: vip page template for High Octane the Genesis Child Theme
 */

remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_loop' ); // Add custom loop

function custom_do_loop() {
global $post;

    // arguments, adjust as needed
    $args = wp_parse_args(
        genesis_get_custom_field( 'query_args' ),
        array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'cat'              => $include,
        'paged'          => get_query_var( 'paged' ) )
    );

    global $wp_query;
    $wp_query = new WP_Query( $args );

    function get_first_post_image() {
      global $post, $posts;
      $first_img = '';
      ob_start();
      ob_end_clean();
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      $first_img = $matches [1] [0];

	//Defines a default image
	  if(empty($first_img)){
		$first_img = "wp-includes/images/media/default.jpg";
	  }
	  return $first_img;
	}

    function _sposts_thumbnails( $excerpt ) {
		global $post;

		$settings = get_option('sideposts_widget');

		$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
		if ( $images ) {
			$img = array();
			foreach( $images as $imageID => $imagePost ) {
				$img[] = wp_get_attachment_image_src($imageID);
			}
			$thumb = array_pop($img);

			$thumb_h = intval( (int) $settings['thumbnail'] * (int) $thumb[2] / (int) $thumb[1] );
		}
	}

    if ( have_posts() ) :
    echo '<div class="blog-page-section">';
                echo '<div class="wrap">';
                    echo '<ul class="blog-list">';
        while ( have_posts() ) : the_post();
        if(get_the_post_thumbnail($thumbnail->ID, 'post')) :
                echo '<li class="list-item">';
                    echo '<div class="one-fourth"><a href="' . get_permalink() .'" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
                    echo get_the_post_thumbnail($thumbnail->ID, 'post' );
                    echo '</a></div>';
                    echo '<div class="three-fourths">';
                    echo '<h2 class="sub-title"> <a href="' . get_permalink() .'"> '. get_the_title() .' </a> </h2>'; // show the title
                    echo '<p class="excerpt">'. get_the_excerpt() . '</p>';
                    echo '<a class="button" href="' . get_permalink() .'" title="Read More">Read More <span class="arrow">&srarr;</span></a>';

                    echo '</div>';
                    echo '<hr>';
                echo '</li>';
        elseif( !get_the_post_thumbnail($thumbnail->ID, 'post') ) :
                echo '<li class="list-item">';
                    echo '<div class="one-fourth"><a href="' . get_permalink() .'" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
                        echo '<img src="' . get_first_post_image() . '" alt="' . get_the_title() . '" height="300px" width="auto">';
                    echo '</a></div>';
                    echo '<div class="three-fourths">';
                    echo '<h2 class="sub-title"> <a href="' . get_permalink() .'"> '. get_the_title() .' </a> </h2>'; // show the title
                    echo '<p class="fw-excerpt">'. get_the_excerpt() . '</p>';
                    echo '<a class="button" href="' . get_permalink() .'" title="Read More">Read More <span class="arrow">&srarr;</span></a>';
                    echo '</div>';
                    echo '<hr>';
                echo '</li>';
        else :
                echo '<li class="list-item">';
                    echo '<h2 class="sub-title"> <a href="' . get_permalink() .'"> '. get_the_title() .' </a> </h2>'; // show the title
                    echo '<a href="' . get_permalink() .'" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
                    echo '</a>';
                    echo '<p class="fw-excerpt">'. get_the_excerpt() . '</p>';
                    echo '<a class="button" href="' . get_permalink() .'" title="Read More">Read More <span class="arrow">&srarr;</span></a>';
                    echo '<hr>';
                echo '</li>';
        endif;
        endwhile;
            echo '</ul>';
        echo '</div></div>';
        do_action( 'genesis_after_endwhile' );
    endif;

    wp_reset_query();
}

genesis();
