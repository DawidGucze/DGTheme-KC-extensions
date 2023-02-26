<?php

// SLIDER BUTTON EXTENSION
function King_Composer_DGTKCE_Slider_Button() {

	if ( function_exists( 'kc_add_map' ) ) {

		$element_name            =  'DGTheme Button';
		$element_description     =  'Add a button';
		$element_category        =  'DGTheme';
		$element_icon            =  'dgt_kc_icon';
		$shortcode_syntax        =  'dgtkce_button';
		$live_editor_path        =  '';
		$tab_name                =  'General Options';

		kc_add_map( array(

			$shortcode_syntax => array(

				'name'          =>  __( $element_name, 'dgtheme-greenarrow' ),
				'description'   =>  __( $element_description, 'dgtheme-greenarrow' ),
				'category'	    =>  $element_category,
				'icon'		    =>  $element_icon,
				'live_editor'   =>  $live_editor_path,
				'is_container'  =>  TRUE,
				'nested'        =>  FALSE,
				'priority'      =>  10,
				'system_only' => FALSE,
				'admin_label' => FALSE,
				'params' => array(

					$tab_name =>  array(
								array(
									'label'       => __('Top', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => FALSE,
									'description' => __('Distance from top of slider in px', 'Your_Optional_Text_Domain_Name_Here'),
									'name'        => 'top_test',
									'type'        => 'text',
									'value'       => '',
								),
								array(
									'label'       => __('Description input animation', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => FALSE,
									'name'        => 'animation_in',
									'type'        => 'select',
									'value'       => '',
									'options' => 
									array(
										'fade' => 'Fade',
										'left' => 'Slide to left',
										'right' => 'Slide to right',
										'top' => 'Slide to bottom',
										'bottom' => 'Slide to top',
										'topLeft' => 'Slide from right top corner',
										'topRight' => 'Slide from left top corner',
										'bottomLeft' => 'Slide from right bottom corner',
										'bottomRight' => 'Slide from left bottom corner',
										'none' => 'No animation',
									)
								),
								array(
									'label'       => __('Description output animation', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => FALSE,
									'name'        => 'animation_out',
									'type'        => 'select',
									'value'       => '',
									'options' => 
									array(
										'fade' => 'Fade',
										'hide' => 'Hide',
										'left' => 'Slide to left',
										'right' => 'Slide to right',
										'top' => 'Slide to top',
										'bottom' => 'Slide to bottom',
										'topLeft' => 'Slide to left top corner',
										'topRight' => 'Slide to right top corner',
										'bottomLeft' => 'Slide to left bottom corner',
										'bottomRight' => 'Slide to right bottom corner',
										'none' => 'No animation',
									)
								),
								array(
									'label'       => __('Time', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => FALSE,
									'description' => __('Animation time', 'Your_Optional_Text_Domain_Name_Here'),
									'name'        => 'time',
									'type'        => 'text',
									'value'       => '',
								),
								array(
									'label'       => __('Delay', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => FALSE,
									'description' => __('Animation delay', 'Your_Optional_Text_Domain_Name_Here'),
									'name'        => 'delay',
									'type'        => 'text',
									'value'       => '',
								),
						array(
							'label'       => __('Buttons', 'Your_Optional_Text_Domain_Name_Here'),
							'admin_label' => FALSE,
							'name'        => 'buttons',
							'type'        => 'group',
							'options'     => array('add_text' => __('Add new button', 'Your_Optional_Text_Domain_Name_Here')),
							'value'       => 
							base64_encode(json_encode(array(
								"1" => 
								array(
									"Text" => "Button Text"
								)
							))),
							'params' => 
							array(
								array(
									'label'       => __('Description', 'dgtheme-greenarrow'),
									'admin_label' => TRUE,
									'name'        => 'Text',
									'type'        => 'text',
									'value'       => '',
								),
								array(
									'label'       => __('Button link', 'Your_Optional_Text_Domain_Name_Here'),
									'name'        => 'link',
									'type'        => 'link',
									'value'       => 'URL is currently empty',
								),
						array(
							'label'       => __('Label_Name_Here', 'Your_Optional_Text_Domain_Name_Here'),
							'name'        => 'design',
							'type'        => 'css',
							'value'       => '',
							'options' => 
							array(
								array(
									
									'screens' => 'any, 1024, 999, 767, 479',
									
									'Typography' => 
									
									array(
										array('property' => 'color',           'label' => 'Color',      'selector' => '.dgtkce_button'),
										array(
											'property' => 'background',      'selector' => '.dgtkce_button'
										)
									)
								)
							)
						),
						array(
							'label'       => __('Label_Name_Here', 'Your_Optional_Text_Domain_Name_Here'),
							'name'        => 'design_hover',
							'type'        => 'css',
							'value'       => '',
							'options' => 
							array(
								array(
									
									'screens' => 'any, 1024, 999, 767, 479',
									
									'Typography' => 
									
									array(
										array('property' => 'color',           'label' => 'Color',      'selector' => '.dgtkce_button'),
										array(
											'property' => 'background',      'selector' => '.dgtkce_button'
										)
									)
								)
							)
						),
							),
						),
					)
				)
			)
		));
	}
}
add_action('init', 'King_Composer_DGTKCE_Slider_Button', 99);