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
</div>



</section><!-- #intro -->



<?php
get_footer();
?>
