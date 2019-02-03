<?php
	$banner_words = get_field('banner_words') ?: false;
	$button_1_text = get_field('button_1_text') ?: false;
	$button_1_target = get_field('button_1_target') ?: false;
	$button_2_text = get_field('button_2_text') ?: false;
	$button_2_target = get_field('button_2_target') ?: false;
?>
<section id="banner" style="background-image: url('<?= $banner_image['url']; ?>');">
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
