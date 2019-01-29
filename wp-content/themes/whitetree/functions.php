<?php
	add_action('wp_enqueue_scripts', function()
	{
		wp_register_style('corestyle', get_template_directory_uri().'/style.css', []);
		wp_enqueue_style('corestyle');

		wp_register_script('corescript', get_template_directory_uri().'/public/js/script.js', ['jquery']);
		wp_enqueue_script('corescript');
	});

	//ACF Global settings section
	if (function_exists('acf_add_options_page'))
	{
		// add parent
		$parent = acf_add_options_page(
		[
			'page_title'    => 'Global Settings'
		]);

		acf_add_options_sub_page(
		[
			'page_title'    => 'Header Settings',
			'parent_slug'   => $parent['menu_slug']
		]);

		// add sub pages
		acf_add_options_sub_page(
		[
			'page_title'    => 'General Settings',
			'parent_slug'   => $parent['menu_slug']
		]);

		acf_add_options_sub_page(
		[
			'page_title'    => 'Footer Settings',
			'parent_slug'   => $parent['menu_slug']
		]);
	}
