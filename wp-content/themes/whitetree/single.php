<?php
	get_header();
?>
	<main role="main">
		<section id="page-headings">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</section>

		<section id="post-content">
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
	</main>
<?php
	get_footer();
