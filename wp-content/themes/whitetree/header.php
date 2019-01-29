<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
<?php
			$logo = get_field('logo', 'option');
?>
			<nav>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6 logo-container">
							<a href="/"><img class="fw" src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>"></a>
						</div>
						<div class="col-xs-6 menu-container">
							<div id="navButton">
								<span class="toggle"></span>
							</div>
							<div class="main-menu hidden-xs">
<?php
								wp_nav_menu(['theme_location' => 'max_mega_menu_1']);
?>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</header>
