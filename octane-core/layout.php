<?php


class Layout {

  public function construct() {}

  public function full_width( $atts, $section_id )  {
    if ( gettype($atts) != 'array' ) return false;
    $section_id = ( $section_id !== '' ) ? sprintf( 'id="%s"', $section_id ) : '';

    printf('<div %s class="section"><div class="wrap">', $section_id );

    foreach ($atts as $tag => $content) {
      printf( '<%s>%s</%s>', $tag, $content, $tag );
    }

    echo '</div></div>';
  }
  public function do_columns( $atts, $section_id = '' ) {
    if ( gettype($atts) != 'array' ) return false;
    $section_id = ( $section_id !== '' ) ? sprintf( 'id="%s"', $section_id ) : '';

    printf('<div %s class="section"><div class="wrap">', $section_id );

    foreach ($atts as $column) {

       printf('<div class="%s">', $column['class']);

      foreach ($column['inner'] as $tag => $content) {
        printf( '<%s>%s</%s>', $tag, $content, $tag );
      }

      echo '</div>';

    }

    echo '</div></div>';
  }

}?>
