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

<?php
  				if( get_the_post_thumbnail_url($post->ID) )
          {
            $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
          }
          else
          {
            $sIstaknutaSlika = get_template_directory_uri(). '/img/about-img.jpg';
          }
?>

<!-- <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-4 about-img">
            <img src="<?php echo $sIstaknutaSlika; ?>" alt="">
          </div>
          <div class="col-lg-8 content">
    <?php
      the_content();
    ?>
          </div>
        </div>

      </div>
    </section> -->


    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?php echo $sIstaknutaSlika; ?>" alt="">
   
          </div>
          <div class="col-lg-6">
          
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>




<?php
get_footer();
?>
