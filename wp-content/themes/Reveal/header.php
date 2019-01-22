<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ); wp_title(' | ')  ?></title>
	<?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/mfglabs_iconset.css">
</head>
<body id="body">
  <!--==========================
    Header
  ============================-->
  <?php
      $sUrlNaslovnica = get_site_url();
      $logo = get_custom_logo();
    ?>
  <header id="header">
    <div class="container">
      

    <div class="pull-left" id="logo">
      <?php echo $logo ?>
    </div>





      <nav id="nav-menu-container">
            <!-- Mobile menu -->
            


      <?php $args = array(
        'theme_location' => 'glavni-menu',
        'menu_class' => 'nav-menu',
        'container' => 'ul',
        'container_id' => false,
        'container_class' => 'nav'
      );
      wp_nav_menu( $args );
      ?>
      <nav id="mobile-menu">
      <div class="mobile1"></div>
<div class="mobile2"></div>
<div class="mobile3"></div>
    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
</nav>
      </nav>
      
</div>

	






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

  </header><!-- #header -->
