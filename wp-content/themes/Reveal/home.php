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


<div class="container">
	<div class="row">
		<div class="col-lg-8">
		<?php
            echo daj_blogpost();
              ?>

		</div>
		<div class="col-md-4">
			<?php get_sidebar('glavni-sidebar'); ?>
</div>
	</div>
</div>



<?php
get_footer();
?>
