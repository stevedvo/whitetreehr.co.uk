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
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</section>
<?php
		}
		else
		{
?>
			<section class="page-headings">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
						</div>
					</div>
				</div>
			</section>
<?php
		}

		$services = get_field('services');

		if ($services)
		{
			include_once('page-templates/partials/services.php');
		}

		include_once('page-templates/partials/latest-news.php');
?>
	</main>
<?php
	get_footer();
