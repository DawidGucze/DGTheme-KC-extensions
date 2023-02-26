<?php

function dgtkce_slider_title_shortcode( $atts, $content = null ) {

    $slider_title_atts = shortcode_atts( array(
        'text'  =>  '',
    ), $atts );

    $text = ( $slider_title_atts['text'] ) ? $slider_title_atts['text'] : '';

    $out = '<div class="dgts_slider_title">' . $text . '</div>';

    return $out;

}
add_shortcode('dgtkce_slider_title', 'dgtkce_slider_title_shortcode');

?>