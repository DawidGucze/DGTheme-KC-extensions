<?php

// SLIDER TITLE EXTENSION
function King_Composer_DGTKCE_Shapes() {

	if ( function_exists( 'kc_add_map' ) ) {

		$element_name            =  'DGTheme Shapes';
		$element_description     =  'Add a shape';
		$element_category        =  'DGTheme';
		$element_icon            =  'dgt_kc_icon';
		$shortcode_syntax        =  'dgtkce_shapes';
		$live_editor_path        =  '';
		$tab_name                =  'General Options';

		kc_add_map( array(

			$shortcode_syntax => array(

				'name'          =>  __( $element_name, 'dgtheme-greenarrow' ),
				'description'   =>  __( $element_description, 'dgtheme-greenarrow' ),
				'category'	    =>  $element_category,
				'icon'		    =>  $element_icon,
				'live_editor'   =>  $live_editor_path,
				'is_container'  =>  FALSE,
				'nested'        =>  FALSE,
				'priority'      =>  10,
				'system_only' => FALSE,
				'admin_label' => FALSE,
				'params' => array(

					$tab_name =>  array(
						array(
							'label'       => __('Shape color', 'Your_Optional_Text_Domain_Name_Here'),
							'admin_label' => TRUE,
							'name'        => 'color',
							'type'        => 'color_picker',
							'value'       => '#ffffff',
						),
						array(
							'label'       => __('Shape points', 'Your_Optional_Text_Domain_Name_Here'),
							'admin_label' => FALSE,
							'name'        => 'shape_points',
							'type'        => 'group',
							'options'     => array('add_text' => __('Add new point', 'Your_Optional_Text_Domain_Name_Here')),
							'value'       => 
							base64_encode(json_encode(array(
								"1" => 
								array(
									"width" => "0",
									"height" => "0",
								),
								"2" => 
								array(
									"width" => "50",
									"height" => "50",
								),
								"3" => 
								array(
									"width" => "100",
									"height" => "0",
								),
							))),
							'params' => 
							array(
								array(
									'label'       => __('Width', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => TRUE,
									'description' => __('Description_Here', 'Your_Optional_Text_Domain_Name_Here'),
									'type'        => 'number_slider',
									'name'        => 'width',
									'value'       => '50',
									'options' => 
									array(
										'min'        => 0,
										'max'        => 100,
										'unit'       => '',
										'show_input' => TRUE,
									),
								),
								array(
									'label'       => __('Height', 'Your_Optional_Text_Domain_Name_Here'),
									'admin_label' => TRUE,
									'description' => __('Description_Here', 'Your_Optional_Text_Domain_Name_Here'),
									'type'        => 'number_slider',
									'name'        => 'height',
									'value'       => '50',
									'options' => 
									array(
										'min'        => 0,
										'max'        => 100,
										'unit'       => '',
										'show_input' => TRUE,
									),
								),
							),
						),
					),
				)
			)
		));
	}
}
add_action('init', 'King_Composer_DGTKCE_Shapes', 99);