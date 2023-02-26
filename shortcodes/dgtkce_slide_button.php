<?php

// KC SLIDE BUTTON EXTENSION SHORTCODE
function dgtkce_button_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';
    $css = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_button_container' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-step="3" data-position="' . esc_attr( $atts['top_test'] ) . ',0" data-in="' . esc_attr( $atts['animation_in'] ) . '" data-out="' . esc_attr( $atts['animation_out'] ) . '" data-time="' . esc_attr( $atts['time'] ) . '" data-delay="' . esc_attr( $atts['delay'] ) . '">';

    foreach( $atts['buttons'] as $i => $button ){
        $style .= dg_render_element_css($button->design, $atts['_id'], $i);
        $style .= dg_render_element_css($button->design_hover, $atts['_id'], $i, ':hover');

        $out .= '<a class="dgtkce_button-' . $i . '" href="' . esc_url( $button->link ) . '">' . $button->Text . '</a>';

    }

    $out .= '</div>';

    $css = '<style type="text/css">' . $style . '</style>';

    return $css . $out;

}
add_shortcode('dgtkce_button', 'dgtkce_button_shortcode');