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

// KC SLIDE TITLE SHORTCODE
function dgtkce_title_shortcode( $atts, $content = null ) {

    extract( $atts );

    $out = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_title_container' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-position="' . esc_attr( $atts['top'] ) . ',0" data-in="' . esc_attr( $atts['animation_in'] ) . '" data-step="1" data-out="' . esc_attr( $atts['animation_out'] ) . '" data-time="' . esc_attr( $atts['time'] ) . '" data-delay="' . esc_attr( $atts['delay'] ) . '"><div class="dgtkce_title"><span>' . esc_attr( $atts['text'] ) . '</span></div></div>';

    return $out;

}
add_shortcode('dgtkce_title', 'dgtkce_title_shortcode');

// KC SLIDE DESCRIPTION SHORTCODE
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

    function dg_render_element_css( $code, $id, $element_id, $action = null ){
        
        global $kc;
        
        $css_code = '';
        $css_any_code = '';
        $css_desktop_code = '';
        $pro_maps = array( 
            'margin' => array('margin-top','margin-right','margin-bottom','margin-left'), 
            'padding' => array('padding-top','padding-right','padding-bottom','padding-left'), 
            'border-radius' => array('border-top-left-radius','border-top-right-radius','border-bottom-right-radius','border-bottom-left-radius')
        );
            
        try{
            
            /*
            *   Decode JSON object
            */      
            $screens = json_decode( str_replace( '`', '"', $code ), true );
            /*
            *   Sort screens
            */
            if (is_array( $screens['kc-css']))
            {
                
                kc_screen_sort ($screens['kc-css']);

                foreach ($screens['kc-css'] as $screen => $groups)
                {
                
                    $css_array = array(); 
                    $css_code_itm = '';
                    
                    foreach ($groups as $group => $properties)
                    {
                        foreach ($properties as $sel => $css)
                        {
                            $sel = explode( '|', $sel );
                            
                            if ($sel[0] == 'gap')
                                $prefix = '';
                            else $prefix = 'body.kc-css-system ';
                            
                            if (!empty( $sel[1]))
                            {
                                $_sel = explode(',', $sel[1]);
                                $selector = array();
                                
                                foreach ($_sel as $__sel)
                                {
                                    /*
                                    *   add spacing for selector which is not :hover
                                    */          
                                    
                                    $__sel = $kc->unesc($__sel);
                                    
                                    if (strpos( trim($__sel), '+') === 0)
                                        $__sel = substr(trim($__sel), 1);
                                    else if (strpos( trim($__sel), ':') !== 0)
                                        $__sel = ' '.trim($__sel);
                                        
                                    $selector[] = $prefix.'.kc-css-'.$id.$__sel.'-'.$element_id.$action;
                                }
                                
                                $selector = implode (',', $selector);
                            
                            }
                            else if ($sel[0] == 'gap')
                            {
                                // set low piorit for gap padding
                                $selector = '#page .kc-css-'.$id;
                            }
                            else
                            {
                                $selector = $prefix.'.kc-css-'.$id;
                            }
                            
                            $gap_selector = $prefix.'.kc-css-'.$id.'>.kc-wrap-columns';
                            
                            // group properties with same selector into one
                                 
                            if (!isset($css_array[ $selector ]))
                                $css_array[ $selector ] = array();
                            
                            if (!isset($css_array[$gap_selector]))
                                $css_array[ $gap_selector ] = array();
                            
                            if (isset($pro_maps[$sel[0]]) && strpos($css, 'inherit') !== false)
                            {
                                $css = explode(' ', $css);
                                for ($i=0; $i<4; $i++)
                                {
                                    if (!empty($css[$i]) && trim($css[$i]) != 'inherit')
                                    {
                                        if (isset($css[4]))
                                            $css[$i] .= ' '.$css[4];
                                            
                                        array_push( $css_array[ $selector ], $pro_maps[$sel[0]][$i].': '.$css[$i] );
                                        
                                    }
                                }
                                    
                            }
                            else
                            {
                                if ($sel[0] == 'gap')
                                {
                                    if( intval($css) < 0 )
                                        $css = '0px';
                                        
                                    array_push( $css_array[ $selector ], 'padding-left: '.$css.';padding-right: '.$css );
                                    array_push( $css_array[ $gap_selector ], 'margin-left: -'.$css.';margin-right: -'.$css.';width: calc(100% + '.(intval($css)*2).'px)' );
                                
                                }
                                else if($sel[0] == 'border')
                                {
                                    
                                    if (strpos( $css, '|') !== false)
                                    {   
                                        $css_line = '';
                                        
                                        $css = explode('|', $css);
                                        $bmap = array('top', 'right', 'bottom', 'left');
                                        
                                        for( $cj=0; $cj<4; $cj++ ){
                                            if( isset( $css[ $cj ] ) && !empty( $css[ $cj ] ) )
                                                $css_line .= 'border-'.$bmap[$cj].': '.$css[$cj].';';
                                        }
                                        
                                        array_push( $css_array[ $selector ], $css_line );
                                        
                                    }else array_push( $css_array[ $selector ], $sel[0].': '.$css );
                                
                                    
                                }else if( $sel[0] == 'custom' ){
                                    
                                    $css = trim( str_replace( array('"', "'", '[', ']'), array('', '', '', ''), $css ) ).'{{{end}}}';
                                    
                                    $css = str_replace( array(';{{{end}}}', '{{{end}}}'), array('', ''), $css );
                                        
                                    array_push( $css_array[ $selector ], $css );
                                
                                }else if( $sel[0] == 'background' ){
                                    
                                    $css_obj = array( 
                                        'color' => 'transparent', 
                                        'linearGradient' => array('',''), 
                                        'image' => 'none', 
                                        'position' => '0% 0%', 
                                        'size' => 'auto', 
                                        'repeat' => 'repeat', 
                                        'attachment' => 'scroll', 
                                        'advanced' => 0 
                                    ); $val = ''; $imp = '';
                                    
                                    if (strpos( $css, ' !important' ) !== false) {
                                        $imp = ' !important';
                                        $css = str_replace( ' !important', '', $css);
                                    }
                                    
                                    $json = base64_decode( $css );
                                    $json = json_decode( $json, true );
                                    
                                    if (is_array( $json ))
                                    {
                                    
                                        $css_obj = array_merge( $css_obj, $json );
                                        
                                        if ($css_obj['linearGradient'][0] !== '')
                                        {
                                            if (strpos($css_obj['linearGradient'][0], 'deg') !== false)
                                            {
                                                if (isset($css_obj['linearGradient'][1]) && !empty($css_obj['linearGradient'][1]))
                                                {
                                                    if (!isset($css_obj['linearGradient'][2]) || empty($css_obj['linearGradient'][2]))
                                                    {
                                                        $css_obj['linearGradient'][2] = $css_obj['linearGradient'][1];
                                                    }
                                                }
                                            }
                                            else if (!isset($css_obj['linearGradient'][1]) || empty($css_obj['linearGradient'][1]))
                                                $css_obj['linearGradient'][1] = $css_obj['linearGradient'][0];
                                            
                                            $css_obj['linearGradient'] = implode(', ', $css_obj['linearGradient']);
                                            $css_obj['linearGradient'] = str_replace(', ,', ', ', $css_obj['linearGradient']);
                                            
                                            $val .= 'linear-gradient('.$css_obj['linearGradient'].')';
                                            
                                        }
                                        
                                        if ($css_obj['color'] != 'transparent' && $css_obj['color'] !== '')
                                        {
                                            if( $val == '' )
                                                $val .= $css_obj['color'];
                                            else $val .= ', '.$css_obj['color'];
                                        }
                                        
                                        if ($css_obj['image'] != 'none' && $css_obj['image'] != '')
                                        {
                                            
                                            if( $val == '' )
                                                $val .= $css_obj['color'];
                                            else if( $css_obj['color'] == 'transparent' || $css_obj['color'] === '' )
                                                $val .= ', transparent';
                                            
                                            $val .= ' url('.$css_obj['image'].') '.$css_obj['position'].'/'.$css_obj['size'].' '.$css_obj['repeat'].' '.$css_obj['attachment'];
                                        }
                                        if (!empty($val))
                                            array_push( $css_array[ $selector ], $sel[0].': '.$val . $imp );
                                    
                                    }
                                    else if(!empty($css))
                                    {
                                        array_push( $css_array[ $selector ], $sel[0].': '.$css . $imp);
                                    }
                                    
                                }else array_push( $css_array[ $selector ], $sel[0].': '.$css );
                                    
                            }
                            
                        }
                    }
                    
                    foreach( $css_array as $sel => $pros ){
                        if( !empty( $pros ) ){
                            $css_code_itm .= $sel.'{'.str_replace( array('{','}'), array('',''), implode( ';', $pros )).';}';
                        }
                    }
                    
                    if ($screen != 'any')
                    {
                        
                        if( strpos( $screen, '-' ) === false ){
                            $css_code .= '@media only screen and (max-width: '.trim($screen).'px){'.$css_code_itm.'}';
                        }else{
                            $screenx = explode('-', $screen);
                            $css_code .= '@media only screen and (min-width: '.trim($screenx[0]).'px) and (max-width: '.trim($screenx[1]).'px){'.$css_code_itm.'}';
                        }
                        
                    }else{
                        $css_any_code .= $css_code_itm;
                    }
                    
                    
                }
            
            }
            
        }catch( Exception $e ){
             echo "\n\n/*Caught exception: ",  $e->getMessage(), "*/\n\n";
        };
        
        return kc_images_filter($css_any_code.$css_code);
        
    }

// KC SLIDE BUTTON SHORTCODE
function dgtkce_button_shortcode( $atts, $content = null ) {

    extract( $atts );
    echo '<pre>';
    var_dump( $atts );
    echo '</pre>';

    $out = '';
    $css = '';

    $css_class = apply_filters( 'kc-el-class', $atts );
    $css_class = array_merge( $css_class, array( 'dgtkce_button_container' ) );

    $out .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . '" data-step="3" data-position="' . esc_attr( $atts['top_test'] ) . ',0">';

    foreach( $atts['buttons'] as $i => $button ){
        $test .= dg_render_element_css($button->design, $atts['_id'], $i);
        $test .= dg_render_element_css($button->design_hover, $atts['_id'], $i, ':hover');

        if ( $i == 1 ) {
            $out .= '<a class="dgtkce_button-' . $i . '" href="' . esc_url( $button->link ) . '" data-in="' . esc_attr( $button->animation_in ) . '" data-step="4" data-out="' . esc_attr( $button->animation_out ) . '" data-time="' . esc_attr( $button->time ) . '" data-delay="' . esc_attr( $button->delay ) . '">' . $button->Text . '</a>';
        } else {
            $out .= '<a class="dgtkce_button-' . $i . '" href="' . esc_url( $button->link ) . '" data-in="' . esc_attr( $button->animation_in ) . '" data-step="5" data-out="' . esc_attr( $button->animation_out ) . '" data-time="' . esc_attr( $button->time ) . '" data-delay="' . esc_attr( $button->delay ) . '">' . $button->Text . '</a>';
        }

    }

    $out .= '</div>';

    $css = '<style type="text/css">' . $test . '</style>';

    return $css . $out;

}
add_shortcode('dgtkce_button', 'dgtkce_button_shortcode');

// KC SHAPES
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

?>