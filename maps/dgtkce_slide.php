<?php

// SLIDER SLIDE EXTENSION
function King_Composer_DGTKCE_Slide() {

	if ( function_exists( 'kc_add_map' ) ) {

		$element_name            =  'Slide';
		$element_title           =  'DGTheme Slide Settings';
		$shortcode_syntax        =  'dgtkce_slide';
		$allowed_child_elements  =  'dgtkce_title, dgtkce_description, dgtkce_button';
		$live_editor_path        =  '';
		$tab_name                =  'General Options';

		kc_add_map( array(

			$shortcode_syntax => array(

				'name'          =>  __($element_name, 'dgtheme-greenarrow'),
				'title'		    =>  $element_title,
				'live_editor'   =>  $live_editor_path,
				'is_container'  =>  TRUE,
				'nested'        =>  TRUE,
				'accept_child'  =>  $allowed_child_elements,
				'system_only' => TRUE,
				'params' => array(

					$tab_name =>  array(
						array(
							'label'       => __('Slide animation', 'Your_Optional_Text_Domain_Name_Here'),
							'admin_label' => FALSE,
							'name'        => 'animation',
							'type'        => 'select',
							'value'       => '',
							'options' => 
							array(
								'fade' => 'Fade',
								'slideLeft' => 'Slide to left',
								'slideRight' => 'Slide to right',
								'slideTop' => 'Slide to bottom',
								'slideBottom' => 'Slide to top',
								'scrollLeft' => 'Scroll to left',
								'scrollRight' => 'Scroll to right',
								'scrollTop' => 'Scroll to bottom',
								'scrollBottom' => 'Scroll to top',
								'none' => 'No animation',
							),
						)
					),
					'Background' => 
					array(
						array(
							'label'       => __('Label_Name_Here', 'Your_Optional_Text_Domain_Name_Here'), 'admin_label' => TRUE,
							'description' => __('Description_Here', 'Your_Optional_Text_Domain_Name_Here'),
							'name'        => 'background',
							'type'        => 'css',
							'value'       => '',
							'options' => 
							array(
								array(
									
									'screens' => 'any, 1024, 999, 767, 479',
									
									'Background' =>
									array(
										array(
											'property' => 'background'
										)
									)
								)
							)
						)
					)
				)
			)
		));
	}
}
add_action('init', 'King_Composer_DGTKCE_Slide', 99);