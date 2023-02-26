<?php

// KC SHAPES EXTENSION SHORTCODE
function dgtkce_shapes_shortcode( $atts, $content = null ) {

    extract( $atts );

    $color = ( $atts['color'] ) ? $atts['color'] : '';
    $out = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_shapes' ) );

    $out .= '<svg class="' . esc_attr( implode( ' ', $css_class ) ) . '" viewBox="0 0 100 100" preserveAspectRatio="none">';
    $out .= '<polygon fill="' . $color . '" points="';

    foreach( $atts['shape_points'] as $i => $point ){

        $out .= $point->width . ',' .$point->height . ' ';

    }

    $out .=  '100,100 0,100"/>';
    $out .= '</svg>';

    return $out;

}
add_shortcode('dgtkce_shapes', 'dgtkce_shapes_shortcode');