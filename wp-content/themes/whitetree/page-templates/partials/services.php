<section id="services">
	<div class="container">
		<div class="row">
<?php
			foreach ($services as $service)
			{
				$image = get_field('image', $service);
				$title = get_the_title($service);
				$introduction = get_field('introduction', $service);
				$link = $service->post_name;
?>
				<div class="col-xs-12 service-container">
					<a href="/services/#<?= $link; ?>">
						<article class="service">
							<div class="image-container">
								<i class="icon major fa <?= $image; ?>"></i>
							</div>

							<div class="title-container">
								<h3><?= $title; ?></h3>
							</div>

							<div class="introduction-container">
								<?= $introduction; ?>
							</div>
						</article>
					</a>
				</div>
<?php
			}
?>
		</div>
	</div>
</section>
