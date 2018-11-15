<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		parent::__construct();
	}

	function register_post_types() {
		if( function_exists('acf_add_options_page') ) {

			acf_add_options_page(
				array(
					'page_title' 	=> 'Theme General Settings',
					'menu_title'	=> 'Theme Settings',
					'menu_slug' 	=> 'theme-general-settings',
					'capability'	=> 'edit_posts',
					'redirect'		=> false
				)
				// array(
				// 	'page_title' 	=> 'Theme General Settings',
				// 	'menu_title'	=> 'Theme Settings',
				// 	'menu_slug' 	=> 'theme-general-settings',
				// 	'capability'	=> 'edit_posts',
				// 	'redirect'		=> false
				// ),
			);

		}

		if( function_exists('acf_add_local_field_group') ) {

			acf_add_local_field_group(array(
				'key' => 'group_5b75c63f582e8',
				'title' => 'Theme Settings',
				'fields' => array(
					array(
						'key' => 'field_5b75c64901d3a',
						'label' => 'Nav Menu',
						'name' => 'menu',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_5b75c65701d3b',
								'label' => 'Label',
								'name' => 'label',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_5b75c66201d3c',
								'label' => 'Link',
								'name' => 'link',
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
								'taxonomy' => array(
								),
								'allow_null' => 0,
								'multiple' => 0,
								'return_format' => 'object',
								'ui' => 1,
							),
							array(
								'key' => 'field_5b75c67101d3d',
								'label' => 'Icon',
								'name' => 'icon',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_5bbf9a629dfb7',
								'label' => 'Enabled',
								'name' => 'enabled',
								'type' => 'true_false',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'message' => '',
								'default_value' => 1,
								'ui' => 1,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'theme-general-settings',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

			acf_add_local_field_group(array(
				'key' => 'group_5b9bfae384e28',
				'title' => 'Project',
				'fields' => array(
					array(
						'key' => 'field_5b9bfc3f9c033',
						'label' => 'Project Description',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b9bfc68d03ad',
						'label' => 'Project Description',
						'name' => 'project_description',
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
						'delay' => 0,
					),
					array(
						'key' => 'field_5b9bfc89d03af',
						'label' => 'Features',
						'name' => 'features',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'feature',
						'field_type' => 'multi_select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'id',
						'multiple' => 0,
					),
					array(
						'key' => 'field_5b9bfc91d03b0',
						'label' => 'Subjects',
						'name' => 'subjects',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'subject',
						'field_type' => 'multi_select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'id',
						'multiple' => 0,
					),
					array(
						'key' => 'field_5b9bfc81d03ae',
						'label' => 'Project URL',
						'name' => 'url',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5b9bfc1e20851',
						'label' => 'Project Page',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b9bfae89dc09',
						'label' => 'Has a Project Page?',
						'name' => 'has_a_project_page',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),
					array(
						'key' => 'field_5b9bfb43ff64f',
						'label' => '\'View Project\' Button link to:',
						'name' => 'view_project_button_link_to',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5b9bfae89dc09',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'project_url' => 'Project URL',
							'project_page' => 'Project Page',
						),
						'default_value' => array(
							'project_url' => 'Project URL',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'return_format' => 'value',
						'placeholder' => '',
					),
					array(
						'key' => 'field_5b9bfbc1a0ff8',
						'label' => 'Project Page Header Image',
						'name' => 'project_page_image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5b9bfae89dc09',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5bbf9d6bd5239',
						'label' => 'Project Page Content',
						'name' => 'project_page_content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5b9bfae89dc09',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
					array(
						'key' => 'field_5b85a6ec72309',
						'label' => '',
						'name' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '<style>#tagsdiv-subject, #tagsdiv-feature {display: none;}</style>',
						'new_lines' => '',
						'esc_html' => 0,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'project',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => array(
// 					0 => 'permalink',
					1 => 'the_content',
// 					2 => 'excerpt',
// 					3 => 'custom_fields',
// 					4 => 'discussion',
// 					5 => 'comments',
// 					6 => 'revisions',
// 					7 => 'slug',
// 					8 => 'author',
// 					9 => 'format',
// 					10 => 'page_attributes',
// 					11 => 'featured_image',
					12 => 'categories',
					13 => 'tags',
// 					14 => 'send-trackbacks',
				),
				'active' => 1,
				'description' => '',
			));
			
			
			acf_add_local_field_group(array(
				'key' => 'group_5b7f21b3df625',
				'title' => 'Events',
				'fields' => array(
					array(
						'key' => 'field_5b85a6ec72309',
						'label' => '',
						'name' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '<style>#tagsdiv-subject, #tagsdiv-feature {display: none;}</style>',
						'new_lines' => '',
						'esc_html' => 0,
					),
					array(
						'key' => 'field_5bd20afc01dfc',
						'label' => 'Time/Location',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b7f27a9a921c',
						'label' => 'Date/Time',
						'name' => 'group_date_time',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5b7f27f079d76',
								'label' => 'Date',
								'name' => 'date',
								'type' => 'date_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '33',
									'class' => '',
									'id' => '',
								),
								'display_format' => 'F j, Y',
								'return_format' => 'Ymd',
								'first_day' => 1,
							),
							array(
								'key' => 'field_5b7f27f979d77',
								'label' => 'Start Time',
								'name' => 'start_time',
								'type' => 'time_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '33',
									'class' => '',
									'id' => '',
								),
								'display_format' => 'g:i A',
								'return_format' => 'g:i A',
							),
							array(
								'key' => 'field_5b7f280279d78',
								'label' => 'End Time',
								'name' => 'end_time',
								'type' => 'time_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '33',
									'class' => '',
									'id' => '',
								),
								'display_format' => 'g:i A',
								'return_format' => 'g:i A',
							),
						),
					),
					array(
						'key' => 'field_5b7f2934f2fd2',
						'label' => 'Location',
						'name' => 'group_location',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5b7f2946f2fd3',
								'label' => 'Event in ADHC?',
								'name' => 'event_in_adhc',
								'type' => 'true_false',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '25',
									'class' => '',
									'id' => '',
								),
								'message' => '',
								'default_value' => 1,
								'ui' => 1,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
							array(
								'key' => 'field_5b7f297cd6d3b',
								'label' => 'Location',
								'name' => 'location',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'field_5b7f2946f2fd3',
											'operator' => '!=',
											'value' => '1',
										),
									),
								),
								'wrapper' => array(
									'width' => '75',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
					array(
						'key' => 'field_5bd20b0b01dfd',
						'label' => 'Display',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b7f27c5a921d',
						'label' => 'Display',
						'name' => 'group_display',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5b7f2857e31fd',
								'label' => 'Display on Event Page',
								'name' => 'display_on_event_page',
								'type' => 'true_false',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
									'class' => '',
									'id' => '',
								),
								'message' => '',
								'default_value' => 1,
								'ui' => 1,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
							array(
								'key' => 'field_5b7f2864e31fe',
								'label' => 'Display on Event Screen',
								'name' => 'display_on_event_screen',
								'type' => 'true_false',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
									'class' => '',
									'id' => '',
								),
								'message' => '',
								'default_value' => 1,
								'ui' => 1,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
							array(
								'key' => 'field_5b7f290862e13',
								'label' => 'Event Advertisement',
								'name' => 'event_advertisement',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'array',
								'preview_size' => 'thumbnail',
								'library' => 'uploadedTo',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
						),
					),
					array(
						'key' => 'field_5bd20b2a01dfe',
						'label' => 'Info',
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5b7f23cea4e23',
						'label' => 'Event Type',
						'name' => 'event_type',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'event_types',
						'field_type' => 'multi_select',
						'allow_null' => 0,
						'add_term' => 1,
						'save_terms' => 1,
						'load_terms' => 1,
						'return_format' => 'object',
						'multiple' => 0,
					),
					array(
						'key' => 'field_5bd20b83199c2',
						'label' => 'Event Description',
						'name' => 'event_description',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_5bd20bdb63082',
						'label' => 'Has Event Page',
						'name' => 'has_event_page',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),
					array(
						'key' => 'field_5bd20f2df266e',
						'label' => 'Event Page Content',
						'name' => 'event_page_content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5bd20bdb63082',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
					array(
						'key' => 'field_5b7f2a8fc2857',
						'label' => 'Event Resources',
						'name' => 'event_page_resources',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5bd20bdb63082',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5b7f2aa8c2858',
								'label' => 'Resource',
								'name' => 'resource',
								'type' => 'flexible_content',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'layouts' => array(
									'5b7f2aaec30fb' => array(
										'key' => '5b7f2aaec30fb',
										'name' => 'link',
										'label' => 'Link',
										'display' => 'row',
										'sub_fields' => array(
											array(
												'key' => 'field_5b7f2b7e448bd',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '50',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'maxlength' => '',
											),
											array(
												'key' => 'field_5b7f2af1b319e',
												'label' => 'Url',
												'name' => 'url',
												'type' => 'url',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '50',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
											),
										),
										'min' => '',
										'max' => '',
									),
									'5b7f2b2b65863' => array(
										'key' => '5b7f2b2b65863',
										'name' => 'file',
										'label' => 'File',
										'display' => 'row',
										'sub_fields' => array(
											array(
												'key' => 'field_5b7f2b86448be',
												'label' => 'Label',
												'name' => 'label',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'maxlength' => '',
											),
											array(
												'key' => 'field_5b7f2b3665864',
												'label' => 'File',
												'name' => 'file',
												'type' => 'file',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'return_format' => 'array',
												'library' => 'uploadedTo',
												'min_size' => '',
												'max_size' => '',
												'mime_types' => '',
											),
										),
										'min' => '',
										'max' => '',
									),
								),
								'button_label' => 'Add Resource',
								'min' => '',
								'max' => '',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'event',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'acf_after_title',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => array(
// 					0 => 'permalink',
					1 => 'the_content',
// 					2 => 'excerpt',
// 					3 => 'custom_fields',
// 					4 => 'discussion',
// 					5 => 'comments',
// 					6 => 'revisions',
// 					7 => 'slug',
// 					8 => 'author',
// 					9 => 'format',
// 					10 => 'page_attributes',
// 					11 => 'featured_image',
					12 => 'categories',
					13 => 'tags',
// 					14 => 'send-trackbacks',
				),
				'active' => 1,
				'description' => '',
			));

			
			acf_add_local_field_group(array(
				'key' => 'group_5bbf97d01f898',
				'title' => 'Home Page',
				'fields' => array(
					array(
						'key' => 'field_5bbf97d64ba21',
						'label' => 'Featured Project',
						'name' => 'featured_project',
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
							0 => 'project',
						),
						'taxonomy' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'return_format' => 'object',
						'ui' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'page-home.php',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		}


		/** Post Type: Events. **/
		$labels = array(
			"name" => __( "Events", "" ),
			"singular_name" => __( "Event", "" ),
		);

		$args = array(
			"label" => __( "Events", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "event", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
		);

		register_post_type( "event", $args );

		/** Post Type: Projects. **/
		$labels = array(
			"name" => __( "Projects", "" ),
			"singular_name" => __( "Project", "" ),
		);

		$args = array(
			"label" => __( "Projects", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "project", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
		);

		register_post_type( "project", $args );






	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies

		/**  Taxonomy: Event Types. **/

		$labels = array(
			"name" => __( "Event Types", "" ),
			"singular_name" => __( "Event Type", "" ),
		);

		$args = array(
			"label" => __( "Event Types", "" ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Event Types",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'event_types', 'with_front' => true, ),
			"show_admin_column" => false,
			"show_in_rest" => false,
			"rest_base" => "event_types",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "event_types", array( "event" ), $args );

		/** Taxonomy: Subjects. **/
		$labels = array(
			"name" => __( "Subjects", "" ),
			"singular_name" => __( "Subject", "" ),
		);

		$args = array(
			"label" => __( "Subjects", "" ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Subjects",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'subject', 'with_front' => true, ),
			"show_admin_column" => false,
			"show_in_rest" => false,
			"rest_base" => "subject",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "subject", array( "project" ), $args );


		/**  Taxonomy: Features. **/
		$labels = array(
			"name" => __( "Features", "" ),
			"singular_name" => __( "Feature", "" ),
		);

		$args = array(
			"label" => __( "Features", "" ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Features",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'feature', 'with_front' => true, ),
			"show_admin_column" => false,
			"show_in_rest" => false,
			"rest_base" => "feature",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "feature", array( "project" ), $args );

	}

	function add_to_context( $context ) {
		// $context['menu'] = new TimberMenu();
		// $context['menu'] = the_field('menu', 'option');
		$context['options'] = get_fields('option');
		$context['site'] = $this;
		return $context;
	}

	function bootstrap( $text ) {
		$text = str_replace('wp-caption', 'figure', $text );
		$text = str_replace('figure-text', 'figure-caption', $text );

		$text = str_replace('<img class="', '<img class="rounded ', $text );
		// $text = str_replace('<img class="', '<img class="rounded ', $text );

		$text = str_replace('alignright', 'float-right ml-3 ', $text );
		$text = str_replace('alignleft', 'float-left mr-3 ', $text );

		// if ( strpos($text, 'figure') ) {
		// 	$text = str_replace('class="figure float-left ', 'class="figure float-left mr-3 ', $text );
		// 	$text = str_replace('class="figure float-right ', 'class="figure float-right ml-3 ', $text );
		//
		// }



		// $text = str_replace("figure-text", "figure-caption", $text );
		// $text = str_replace("figure-text", "figure-caption", $text );
		// $text = str_replace("figure-text", "figure-caption", $text );
		//
		//
		// $( "img.alignright" ).addClass('rounded').addClass('float-right').removeClass('alignright').css('margin-left', '1rem').css('margin-top', '0.5rem');
		// $( "img.alignleft" ).addClass('rounded').addClass('float-left').removeClass('alignleft').css('margin-right', '1rem').css('margin-top', '0.5rem');


		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('bootstrap', new Twig_SimpleFilter('bootstrap', array($this, 'bootstrap')));
		return $twig;
	}

}

new StarterSite();
