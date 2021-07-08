<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60849c02b9563',
	'title' => 'Контактная форма',
	'fields' => array(
		array(
			'key' => 'field_60849c392b2df',
			'label' => 'Контактная форма',
			'name' => 'bottom_contact_form',
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
				0 => 'wpcf7_contact_form',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'id',
			'save_custom' => 0,
			'save_post_status' => 'publish',
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'all',
			),
		),
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
	),
	'menu_order' => 5,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
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
	'modified' => 1619877985,
));

endif;