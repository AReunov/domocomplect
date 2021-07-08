<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60a2f5d6c4973',
	'title' => 'Шаблон страницы Бизнес',
	'fields' => array(
		array(
			'key' => 'field_60a2f6732dfdc',
			'label' => 'Страницы',
			'name' => 'pages',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 1,
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_60a2f5ef0b605',
					'label' => 'Страница',
					'name' => 'page_link',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'page',
					),
					'taxonomy' => '',
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'save_custom' => 0,
					'save_post_status' => 'publish',
					'acfe_bidirectional' => array(
						'acfe_bidirectional_enabled' => '0',
					),
					'ui' => 1,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-business.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'featured_image',
	),
	'active' => true,
	'description' => '',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1621292748,
));

endif;