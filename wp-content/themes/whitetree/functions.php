<?php
	add_action('wp_enqueue_scripts', function()
	{
		wp_register_style('corestyle', get_template_directory_uri().'/style.css', []);
		wp_enqueue_style('corestyle');

		wp_register_script('corescript', get_template_directory_uri().'/public/js/script.js', ['jquery']);
		wp_enqueue_script('corescript');
	});
