<section id="news">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3>LATEST NEWS</h3>
<?php
				$query = new WP_Query(
				[
					'post_type'      => 'post',
					'posts_per_page' => 5
				]);

				if ($query->have_posts())
				{
					while ($query->have_posts())
					{
						$query->the_post();

						$title = get_the_title();
						$url = get_permalink();
						$date = get_the_date('j F Y');
						$excerpt = get_the_excerpt();
?>
						<a href="<?= $url; ?>">
							<article>
								<h4><?= $title; ?></h4>
								<span class="article-date"><?= $date; ?></span>
								<div class="article-excerpt-container">
									<?= $excerpt; ?>
								</div>
							</article>
						</a>
<?php
					}
				}
				else
				{
?>
					<p>No news yet - check back soon!</p>
<?php
				}

				wp_reset_postdata();
?>
			</div>
		</div>
	</div>
</section>
