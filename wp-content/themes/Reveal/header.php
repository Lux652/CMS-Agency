<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ); wp_title(' | ')  ?></title>
	<?php wp_head(); ?>
</head>
<body id="body">
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">
    <?php
      $sUrlNaslovnica = get_site_url();
    ?>
      <div id="logo" class="pull-left">
        <h1><a href="<?php echo $sUrlNaslovnica ?>" class="scrollto">Pied<span>Piper</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
      <?php $args = array(
        'theme_location' => 'glavni-menu',
        'menu_class' => 'nav-menu',
        'container' => 'ul',
        'container_id' => false,
        'container_class' => 'nav'
      );
      wp_nav_menu( $args );
      ?>


      </nav>





      <!-- <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>#nav-menu-container -->
    </div>
  </header><!-- #header -->
