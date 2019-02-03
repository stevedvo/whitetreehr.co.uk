<section id="packages">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul>
<?php
					foreach ($packages as $package)
					{
?>
						<li><?= $package['package']; ?></li>
<?php
					}
?>
				</ul>
			</div>
		</div>
	</div>
</section>
