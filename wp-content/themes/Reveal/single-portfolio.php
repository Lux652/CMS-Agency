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

		$Tip = wp_get_post_terms( $post->ID, 'tip_portfolio', $args);

        if(sizeof($Tip)>0){
            $Tip = implode(", ",$Tip);
        }
        else{
            $Tip = "_";
        }



		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/portfolio/8.jpg';
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

              <h4><?php echo $Tip; ?></h4>
              <h1><?php echo $post->post_title; ?></h1>
              <img src="<?php echo $sIstaknutaSlika ?>"/>
            </div>
          </div>
        </div>
      </div>
		</header>



<?php
get_footer();
?>
