<?php
	if ( ! function_exists( 'inicijaliziraj_temu' ) )
	{
		function inicijaliziraj_temu()
		{
			add_theme_support( 'post-thumbnails' );
			register_nav_menus( array(
				'glavni-menu' => "Glavni navigacijski izbornik",
				'sporedni-menu' => "Izbornik u podnožju",
			) );
			add_theme_support( 'custom-background', apply_filters(
				'test_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
			add_theme_support( 'customize-selective-refresh-widgets' );
		}
	}
	add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

	// regsitracija sidebar-a
	/*
	function aktiviraj_sidebar()
	{
		register_sidebar(
			array (
				'name' => "Glavni sidebar",
				'id' => 'glavni-sidebar',
				'description' => "Glavni sidebar",
				'before_widget' => '<div class="widget-content">',
				'after_widget' => "</div>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			)
		);
	}

	add_action( 'widgets_init', 'aktiviraj_sidebar' );
	*/

	//učitavanje CSS datoteke
	function ucitaj_glavni_css()
	{
		wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'ucitaj_glavni_css' );

	//učitavanje javascript datoteke
	function ucitaj_glavne_js() 
	{
		wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), true);
		wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js', array('jquery'), true);
	}
	add_action( 'wp_enqueue_scripts', 'ucitaj_glavne_js', 1 );

	function daj_vijesti_kategorije($kategorija)
	{
		$args = array(
			'posts_per_page'   	=> 3,
			'offset'           	=> 0,
			'category'         	=> '',
			'category_name'    	=> $kategorija,
			'orderby'          	=> 'date',
			'order'            	=> 'DESC',
			'include'          	=> '',
			'exclude'          	=> '',
			'meta_key'         	=> '',
			'meta_value'       	=> '',
			'post_type'        	=> 'post',
			'post_mime_type'   	=> '',
			'post_parent'      	=> '',
			'author'	   		=> '',
			'author_name'	   	=> '',
			'post_status'      	=> 'publish',
			'suppress_filters' 	=> true,
			'fields'           	=> '',
		);
		$posts_array = get_posts( $args );
		$sHtml = "";
		foreach ($posts_array as &$single_post) 
		{
			$vijest_naziv = $single_post->post_title;
			$vijest_slika = get_the_post_thumbnail_url($single_post->ID);
			$vijest_datum = $single_post->post_date;
			$vijest_url = $single_post->guid;
			$sHtml .=
    		'<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="'.$vijest_slika.'" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<span class="post-date">'.$vijest_datum.'</span>
								</div>
								<h3 class="post-title"><a href="'.$vijest_url.'">'.$vijest_naziv.'</a></h3>
							</div>
						</div>
					</div>';
		}
		return $sHtml;
	}
?>
