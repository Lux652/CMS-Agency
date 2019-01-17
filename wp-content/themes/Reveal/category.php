<?php
	get_header();
?>
<?php
$sIstaknutaSlika = get_template_directory_uri(). '/img/about-bg.jpg';

?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?php echo $post->post_title; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <ul>
    <?php
      if ( have_posts() )
      {
        while ( have_posts() )
        {
          the_post();
          echo '<li><a href="'.$post->guid.'">'.$post->post_title.'</a></li>';
        }
      }
    ?>
    </ul>



<?php
get_footer();
?>
