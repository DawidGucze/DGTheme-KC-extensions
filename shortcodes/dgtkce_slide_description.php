<?php

// KC SLIDE DESCRIPTION EXTENSION SHORTCODE
function dgtkce_description_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_description_container' ) );

    $special = ( $atts['special'] == 'yes' ) ? ' data-special="cycle"' : '';

    foreach( $atts['descriptions'] as $i => $description ){

        if ( $i == 1 ) {
            $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-position="' . esc_attr( $description->top ) . ',0" data-in="' . esc_attr( $description->animation_in ) . '" data-step="2" data-out="' . esc_attr( $description->animation_out ) . '" data-time="' . esc_attr( $description->time ) . '" data-delay="' . esc_attr( $description->delay ) . '"><div class="dgtkce_description">' . $description->Text . '</div></div>';
        } else {
            $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-position="' . esc_attr( $description->top ) . ',0" data-in="' . esc_attr( $description->animation_in ) . '" data-step="2" data-out="' . esc_attr( $description->animation_out ) . '" data-time="' . esc_attr( $description->time ) . '" data-delay="' . esc_attr( $description->delay ) . '"' . $special . '><div class="dgtkce_description">' . $description->Text . '</div></div>';
        }

    }

    return $out;

}
add_shortcode('dgtkce_description', 'dgtkce_description_shortcode');