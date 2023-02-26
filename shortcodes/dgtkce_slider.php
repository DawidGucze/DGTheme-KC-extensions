<?php

// KC SLIDER EXTENSION SHORTCODE
function dgtkce_slider_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_slider_wrapper' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '"><div class="dgtkce_slider"><div class="fs_loader"></div>';
    $out .= do_shortcode( $content );
    $out .= '</div></div>';

    return $out;

}
add_shortcode('dgtkce_slider', 'dgtkce_slider_shortcode');