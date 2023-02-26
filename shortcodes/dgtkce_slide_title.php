<?php

// KC SLIDE TITLE EXTENSION SHORTCODE
function dgtkce_title_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_title_container' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-position="' . esc_attr( $atts['top'] ) . ',0" data-in="' . esc_attr( $atts['animation_in'] ) . '" data-step="1" data-out="' . esc_attr( $atts['animation_out'] ) . '" data-time="' . esc_attr( $atts['time'] ) . '" data-delay="' . esc_attr( $atts['delay'] ) . '"><div class="dgtkce_title">' . esc_attr( $atts['text'] ) . '</div></div>';

    return $out;

}
add_shortcode('dgtkce_title', 'dgtkce_title_shortcode');