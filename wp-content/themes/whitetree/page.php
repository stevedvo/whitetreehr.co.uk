<?php
	get_header();
?>
	<main role="main">
<?php
		$banner_image = get_field('banner_image') ?: false;
		$banner_words = get_field('banner_words') ?: false;
		$button_1_text = get_field('button_1_text') ?: false;
		$button_1_target = get_field('button_1_target') ?: false;
		$button_2_text = get_field('button_2_text') ?: false;
		$button_2_target = get_field('button_2_target') ?: false;

		if ($banner_image)
		{
?>
			<section class="banner" style="background-image: url('<?= $banner_image['url']; ?>');">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="banner-content-container">
								<div class="banner-content-container-inner fw">
									<h1><?= $banner_words; ?></h1>
									<div class="col-xs-6">
										<a class="button opaque" href="<?= $button_1_target; ?>"><?= $button_1_text; ?></a>
									</div>
									<div class="col-xs-6">
										<a class="button transparent" href="<?= $button_2_target; ?>"><?= $button_2_text; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="post-banner-intro">
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
?>
			<section class="services">
<?php
				foreach ($services as $service)
				{
?>
					<article class="service">
<?php
						$image = get_field('image', $service);
						$title = get_the_title($service);
						$introduction = get_field('introduction', $service);
						$link = get_the_permalink($service);
?>
						<a href="<?= $link; ?>">
							<div class="image-container">
								<i class="icon major fa <?= $image; ?>"></i>
							</div>

							<div class="title-container">
								<h3><?= $title; ?></h3>
							</div>

							<div class="introduction-container">
								<?= $introduction; ?>
							</div>
						</a>
					</article>
<?php
				}
?>
			</section>
<?php
		}
?>
	</main>
<?php
	get_footer();
