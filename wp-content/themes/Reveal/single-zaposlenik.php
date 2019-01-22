<?php
	get_header();
?>
<?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();
		$sIstaknutaSlika = "";
		$args = array( 
			'fields' => 'names' 
		);

		$NaslovnaTitula = wp_get_post_terms( $post->ID, 'naslovna_titula', $args);

		$sNaslovnaTitula = "-";
		if(sizeof($NaslovnaTitula)>0)
		{
			
			$sNaslovnaTitula = implode(", ", $NaslovnaTitula);
		}

		
		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/team-1.jpg';
		}
	}

	$objavaContent=get_post_field('post_content', $objava->ID);
}

?>
		
		<!-- <main>
			<div class="container">
				<div class="row">

					<div class="col-lg-8">
					<h1></h1>
					<h4>></h4>
					<hr>
					<h5>Bio</h5>
					<div>
						<p></p>
					</div>
					<div>
						<hr>
						<h5>Istaknuti projekti</h5>
						

					</div>
					</div>


					<div class="col-lg-4">
						<div class="z-image">
						
						</div>
					</div>

				</div>
			</div>

	</main> -->

	<main>
		<div class="container">
			<div class="row">

				<div class="col-lg-8">
					<h1><?php echo $post->post_title; ?></h1>
					<h4><?php echo $sNaslovnaTitula; ?></h4>
					<hr>
					<h5>Bio</h5>

					<div>
						<p><?php echo $objavaContent ?></p>
					</div>
					<hr>
					<h5>Istaknuti projekti</h5>
				</div>
				<div class="col-lg-4">
					<div class="z-image">
					<img src="<?php echo $sIstaknutaSlika ?>"/>

					</div>
				</div>

				
<div class="col-md-8">
<?php echo daj_htm_istaknuti_projekti_zaposlenika($post->ID);?>
</div>

			</div>

		</div>
	</main>

<?php
get_footer();
?>
