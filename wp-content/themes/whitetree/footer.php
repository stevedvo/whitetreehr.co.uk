		<footer class="footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 links-container">
						<h3>Links</h3>
<?php
						wp_nav_menu(['theme_location' => 'max_mega_menu_1']);
?>
					</div>
<?php
					$about_info = get_field('about_info', 'option');

					if ($about_info)
					{
?>
						<div class="col-xs-12 info-container">
							<?= $about_info; ?>
						</div>
<?php
					}

					$social_links = get_field('social_links', 'option');

					if ($social_links)
					{
?>
						<div class="col-xs-12 social-links-container">
<?php
							foreach ($social_links as $social_link)
							{
								$icon = $social_link['icon'];
								$link = $social_link['link'];
?>
								<a href="<?= $link; ?>" target="_blank" class="icon fa <?= $icon; ?>"></a>
<?php
							}
?>
						</div>
<?php
					}
?>
					<div class="col-xs-12 copyright-container">
						<p><?= get_field('copyright_company_info', 'option'); ?></p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
