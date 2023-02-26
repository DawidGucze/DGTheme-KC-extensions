<?php

// SLIDER EXTENSION
function King_Composer_DGTKCE_Slider() {

	if ( function_exists( 'kc_add_map' ) ) {

		$element_name            =  'DGTheme Slider';
		$element_description     =  'Add a slider';
		$element_category        =  'DGTheme';
		$element_icon            =  'dgt_kc_icon';
		$shortcode_syntax        =  'dgtkce_slider';
		$live_editor_path        =  plugin_dir_path( __FILE__ ).'shortcodes/live/dgtkce-shapes.php';
		$tab_name                =  'Slider Options';

		kc_add_map( array(

			$shortcode_syntax => array(

				'name'          =>  __( $element_name, 'dgtheme-greenarrow' ),
				'description'   =>  __( $element_description, 'dgtheme-greenarrow' ),
				'category'	    =>  $element_category,
				'icon'		    =>  $element_icon,
				'live_editor'   =>  $live_editor_path,
				'is_container'  =>  TRUE,
				'priority'      =>  10,
				'system_only' => FALSE,
				'admin_label' => FALSE,
				'views' => array(
					'type' => 'views_sections',
					'sections' => 'dgtkce_slide'
				),
				'params' => array(

					$tab_name => array(
						array(
							'label'       => __('Slider height', 'Your_Optional_Text_Domain_Name_Here'),
							'admin_label' => TRUE,
							'name'        => 'slider_height',
							'type'        => 'css',
							'options' => 
							array(
								array(
									
									'screens' => 'any, 1024, 999, 767, 479',
									
									'Slider height' =>
									array(
										array(
											'property' => 'height',
											'label' => 'Slider height',
											'selector' => '.dgtkce_slider'
										)
									)
								)
							)
						)
					)
				),
				'content' => '[dgtkce_slide title="New Slide"][/dgtkce_slide]'
			)
		));
	}
}
add_action('init', 'King_Composer_DGTKCE_Slider', 99);