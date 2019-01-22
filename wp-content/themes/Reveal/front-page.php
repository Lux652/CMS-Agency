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

  <section id="intro">

<?php the_content(); ?>

</section>

<section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Naše usluge</h2>
        </div>

        <div class="row">
        <?php
            echo daj_usluge();
              ?>

          </div>
</section>




<?php
get_footer();
?>
