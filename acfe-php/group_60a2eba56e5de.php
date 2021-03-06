<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60a2eba56e5de',
	'title' => 'Иконки',
	'fields' => array(
		array(
			'key' => 'field_60a2f0f8fffbb',
			'label' => 'Обычная иконка',
			'name' => 'main_icon',
			'type' => 'image',
			'instructions' => 'Иконка страницы будет отображаться на родительской странице',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'uploader' => '',
			'acfe_thumbnail' => 0,
			'return_format' => 'id',
			'preview_size' => 'medium',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'library' => 'all',
		),
		array(
			'key' => 'field_60a2f12afffbc',
			'label' => 'Активная иконка',
			'name' => 'hover_icon',
			'type' => 'image',
			'instructions' => 'Эта иконка будет в начале страницы и на родительской странице при наведении мыши',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'uploader' => '',
			'acfe_thumbnail' => 0,
			'return_format' => 'id',
			'preview_size' => 'medium',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'library' => 'all',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-business-child.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'featured_image',
	),
	'active' => true,
	'description' => 'Иконки для Бизнес-страницы',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1621293583,
));

endif;