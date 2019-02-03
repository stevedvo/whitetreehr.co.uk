<?php
	get_header();
?>
	<main role="main">
<?php
		$banner_image = get_field('banner_image') ?: false;

		if ($banner_image)
		{
			include_once('page-templates/partials/banner.php');
?>
			<section id="post-banner-intro">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
<?php
							the_content();
?>
						</div>
					</div>
				</div>
			</section>
<?php
		}
		else
		{
?>
			<section id="page-headings">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="page-title"><?php the_title(); ?></h1>
<?php
							the_content();
?>
							<hr/>
						</div>
					</div>
				</div>
			</section>
<?php
		}

		$services = get_field('services');

		if ($services)
		{
			if ($post->post_name == 'services')
			{
				include_once('page-templates/partials/services-details.php');
			}
			else
			{
				include_once('page-templates/partials/services.php');
			}
		}

		$packages = get_field('packages');

		if ($packages)
		{
			include_once('page-templates/partials/packages.php');
		}

		if (is_front_page())
		{
			include_once('page-templates/partials/latest-news.php');
		}
?>
	</main>
<?php
	get_footer();
