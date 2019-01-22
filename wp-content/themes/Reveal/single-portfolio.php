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

    <!-- Page Header
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
    </header> -->
    
    <div class="container single-portfolio">

    <h1><?php echo $post->post_title; ?></h1>
    <h4><?php echo $Tip; ?></h4>


    <div class="row">

      <div class="col-md-8">
      <img class="projekt_img img-fluid" src="<?php echo $sIstaknutaSlika ?>"/>
      <div>
      <?php echo get_post_gallery(); ?>
        
      </div>
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Opis projekta</h3>
        <p><?php the_content(); ?></p>

        <h3 class="my-3">Zaposlenici na projektu</h3>
       

      </div>
    </div>



    </div>



<?php
get_footer();
?>
