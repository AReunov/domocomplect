<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_608d5b6b07e04',
	'title' => 'Шаблон страницы Домокомплекты',
	'fields' => array(
		array(
			'key' => 'field_608d5b6b11464',
			'label' => 'Домокомплкты',
			'name' => 'complects',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 1,
			'collapsed' => 'field_608d5b6b18ce3',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Добавить домокомплект',
			'sub_fields' => array(
				array(
					'key' => 'field_608d5b6b18ce3',
					'label' => 'Название',
					'name' => 'complect_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '80',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'Домокомплект «',
					'append' => '»',
					'maxlength' => '',
				),
				array(
					'key' => 'field_608d5f6d897d7',
					'label' => 'Цена',
					'name' => 'complect_price',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'от',
					'append' => 'за 1м<sup>2</sup>',
					'maxlength' => '',
				),
				array(
					'key' => 'field_608d5b6b27ca3',
					'label' => 'Описание',
					'name' => 'complect_description',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 1,
				),
				array(
					'key' => 'field_608d5fcd897d8',
					'label' => 'Форма заявки',
					'name' => 'complect_form',
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
					'allow_null' => 0,
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
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-domocomplect.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
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
	'modified' => 1619878607,
));

endif;