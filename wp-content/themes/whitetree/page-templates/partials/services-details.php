<section id="services-details">
	<div class="container">
		<div class="row">
<?php
			foreach ($services as $service)
			{
				$title = get_the_title($service);
				$introduction = get_field('introduction', $service);
				$bullets = get_field('bullets', $service);
?>
				<div class="col-xs-12 service-container">
					<article id=<?= $service->post_name; ?> class="service">
						<div class="title-container">
							<h3><?= $title; ?></h3>
						</div>

						<div class="introduction-container">
							<?= $introduction; ?>
						</div>

						<div class="bullets-container">
<?php
							if ($bullets)
							{
?>
								<ul class="service-bullets">
<?php
									foreach ($bullets as $bullet)
									{
?>
										<li><?= $bullet['bulletpoint']; ?></li>
<?php
									}
?>
								</ul>
<?php
							}
?>
						</div>
					</article>
				</div>
<?php
			}
?>
		</div>
	</div>
</section>
