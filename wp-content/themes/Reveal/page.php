<?php
	get_header();
?>
<?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();
	}
}
?>

<section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
			  
    <?php
    	the_content();
    ?>

          </div>
        </div>

      </div>
    </section>




<?php
get_footer();
?>
