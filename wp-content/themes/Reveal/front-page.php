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

<div class="intro-content">
	<h2><?php echo get_bloginfo( 'description' ); ?></h2>
	<div>
        <a href="o-nama" class="btn-get-started scrollto">O nama</a>
        <a href="portfolio" class="btn-projects scrollto">Naši projekti</a>
      </div>
</div>



</section><!-- #intro -->



<?php
get_footer();
?>
