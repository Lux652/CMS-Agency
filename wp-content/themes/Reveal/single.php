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
		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/about-bg.jpg';
    }
    
    $naziv = get_the_title( $post->ID );
    $objavaDatum = get_the_date( $format,$post->ID );
    $objavaVrijeme = get_the_time($format,$post->ID);
    $autorImg = get_template_directory_uri(). '/img/pp.png';
    $sUrlNaslovnica = get_site_url();
    $objavaAutor=get_bloginfo();
	}
}


?>

<div class="container">
<div class="row">
 <!-- Post Content Column -->
  <div class="col-lg-12">
    <!-- Title -->
    <h1 class="mt-4"><?php echo $naziv; ?></h1>
    <p> <img class="author-img" src="<?php echo $autorImg; ?>"> <a href="<?php echo $sUrlNaslovnica;?>"><?php echo $objavaAutor; ?> </a></p>
    <hr>
   <!-- Date/Time -->
    <p><?php echo $objavaDatum; ?> | <?php echo $objavaVrijeme; ?> </p>
    <hr>
    <img class="img-fluid rounded" src="<?php echo $sIstaknutaSlika; ?>" alt="">

    <hr>
    <p class="lead"> <?php echo $post->post_content;?> </p>

  </div>

</div>

</div>

<?php
get_footer();
?>
