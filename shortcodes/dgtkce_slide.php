<?php

// KC SLIDE EXTENSION SHORTCODE
function dgtkce_slide_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';
    $image = wp_get_attachment_url( $atts['image'] );

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_slide slide' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-in="' . esc_attr( $atts['animation'] ) . '">';
    $out .= do_shortcode( $content );
    $out .= '</div>';

    return $out;

}
add_shortcode('dgtkce_slide', 'dgtkce_slide_shortcode');