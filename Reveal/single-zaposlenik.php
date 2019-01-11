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
}

?>

    <!-- Page Header -->
    <header class="masthead">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">

              <h4><?php echo $sNaslovnaTitula; ?></h4>
              <h1><?php echo $post->post_title; ?></h1>
              <img src="<?php echo $sIstaknutaSlika ?>"/>
            </div>
          </div>
        </div>
      </div>
		</header>
		
		<main>
		<h2>Projekti</h2>
		<?php
	    	echo daj_htm_istaknuti_projekti_zaposlenika($post->ID);
	    ?>
	</main>

<?php
get_footer();
?>
