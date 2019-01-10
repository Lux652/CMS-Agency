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

	function ucitaj_select2()
{
	wp_enqueue_style( 'select2css', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	wp_enqueue_script('select2js', get_template_directory_uri().'/assets/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('select2-admin-js', get_template_directory_uri().'/js/init_select2.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_select2' );


	function registriraj_zaposlenike_cpt() 
	{
			$labels = array(
				'name' 						=> 		_x( 'Zaposlenici', 'Post Type General Name', 'piedpiper' ),
				'singular_name' 			=> 		_x( 'Zaposlenik', 'Post Type Singular Name', 'piedpiper' ),
				'menu_name' 				=> 		__( 'Zaposlenici', 'PiedPiper' ),
				'name_admin_bar' 			=> 		__( 'Zaposlenici', 'piedpiper' ),
				'archives' 					=> 		__( 'Team', 'piedpiper' ),
				'attributes' 				=> 		__( 'Atributi', 'piedpiper' ),
				'parent_item_colon' 		=> 		__( 'Roditeljski element', 'piedpiper' ),
				'all_items' 				=> 		__( 'Svi Zaposlenici', 'piedpiper' ),
				'add_new_item' 				=> 		__( 'Dodaj novog zaposlenika', 'piedpiper' ),
				'add_new'					=> 		__( 'Dodaj novog zaposlenika', 'piedpiper' ),
				'new_item' 					=> 		__( 'Novi zaposlenik', 'piedpiper' ),
				'edit_item' 				=> 		__( 'Uredi zaposlenika', 'piedpiper' ),
				'update_item' 				=> 		__( 'Ažuriraj zaposlenika', 'piedpiper' ),
				'view_item' 				=> 		__( 'Pogledaj zaposlenika', 'piedpiper' ),
				'view_items' 				=> 		__( 'Pogledaj zaposlenike', 'piedpiper' ),
				'search_items' 				=> 		__( 'Pretraži zaposlenike', 'piedpiper' ),
				'not_found' 				=> 		__( 'Nije pronađeno', 'piedpiper' ),
				'not_found_in_trash' 		=> 		__( 'Nije pronađeno u smeću', 'piedpiper' ),
				'featured_image' 			=> 		__( 'Glavna slika', 'piedpiper' ),
				'set_featured_image' 		=> 		__( 'Postavi glavnu sliku', 'piedpiper' ),
				'remove_featured_image' 	=> 		__( 'Ukloni glavnu sliku', 'piedpiper' ),
				'use_featured_image' 		=> 		__( 'Postavi za glavnu sliku', 'piedpiper' ),
				'insert_into_item' 			=> 		__( 'Umentni', 'piedpiper' ),
				'uploaded_to_this_item' 	=> 		__( 'Preneseno', 'piedpiper' ),
				'items_list' 				=> 		__( 'Lista', 'piedpiper' ),
				'items_list_navigation' 	=> 		__( 'Navigacija među zaposlenicima', 'piedpiper' ),
				'filter_items_list' 		=> 		__( 'Filtriranje zaposlenika', 'piedpiper' ),
				);
			$args = array(
				'label' 			=> 		__( 'Zaposlenik', 'piedpiper' ),
				'description' 		=> 		__( 'Zaposlenik post type', 'piedpiper' ),
				'labels' 			=> 		$labels,
				'supports' 			=> 		array( 'title', 'editor', 'thumbnail', 'revisions' ),
				'hierarchical' 		=> 		false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-universal-access-alt',
				'show_in_admin_bar' => true,
				'show_in_nav_menus' => true,
				'can_export' => false,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'page',
				);
				register_post_type( 'zaposlenik', $args );
		}
		add_action( 'init', 'registriraj_zaposlenike_cpt', 0 );

		function registriraj_taksonomiju_titula() 
		{
				$labels = array(
					'name' => _x( 'Titula', 'Taxonomy General Name', 'piedpiper' ),
					'singular_name' => _x( 'Naslovna titula', 'Taxonomy Singular Name', 'piedpiper' ),
					'menu_name' => __( 'Titula', 'piedpiper' ),
					'all_items' => __( 'Sve titule', 'piedpiper' ),
					'parent_item' => __( 'Roditeljska titula', 'piedpiper' ),
					'parent_item_colon' => __( 'Roditeljsko titula', 'piedpiper' ),
					'new_item_name' => __( 'Novu naslovnu titulu', 'piedpiper' ),
					'add_new_item' => __( 'Dodaj novu naslovnu titulu', 'piedpiper' ),
					'edit_item' => __( 'Uredi naslovnu titulu', 'piedpiper' ),
					'update_item' => __( 'Ažuiriraj naslovnu titulu', 'piedpiper' ),
					'view_item' => __( 'Pogledaj naslovnu titulu', 'piedpiper' ),
					'separate_items_with_commas' => __( 'Odvojite zvanja sa zarezima', 'piedpiper' ),
					'add_or_remove_items' => __( 'Dodaj ili ukloni naslovnu titulu', 'piedpiper' ),
					'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'piedpiper' ),
					'popular_items' => __( 'Popularna titula', 'piedpiper' ),
					'search_items' => __( 'Pretraga', 'piedpiper' ),
					'not_found' => __( 'Nema rezultata', 'piedpiper' ),
					'no_terms' => __( 'Nema naslovnih titula', 'piedpiper' ),
					'items_list' => __( 'Lista naslovnih titula', 'piedpiper' ),
					'items_list_navigation' => __( 'Navigacija', 'piedpiper' ),
				);
				$args = array(
					'labels' 			=> 		$labels,
					'hierarchical' 		=> 		true,
					'public' 			=> 		true,
					'show_ui' 			=> 		true,
					'show_admin_column' => 		true,
					'show_in_nav_menus' => 		true,
					'show_tagcloud' 	=> 		true,
				);
				register_taxonomy( 'naslovna_titula', array( 'zaposlenik' ), $args );
		}
		add_action( 'init', 'registriraj_taksonomiju_titula', 0 );

		function registriraj_portfolio_cpt() 
		{
				$labels = array(
					'name' 						=> 		_x( 'Portfolio', 'Post Type General Name', 'piedpiper' ),
					'singular_name' 			=> 		_x( 'Portfolio', 'Post Type Singular Name', 'piedpiper' ),
					'menu_name' 				=> 		__( 'Portfolio', 'PiedPiper' ),
					'name_admin_bar' 			=> 		__( 'Portfolio', 'piedpiper' ),
					'archives' 					=> 		__( 'Portfolio', 'piedpiper' ),
					'attributes' 				=> 		__( 'Atributi', 'piedpiper' ),
					'parent_item_colon' 		=> 		__( 'Roditeljski element', 'piedpiper' ),
					'all_items' 				=> 		__( 'Sav Portfolio', 'piedpiper' ),
					'add_new_item' 				=> 		__( 'Dodaj novi Portfolio', 'piedpiper' ),
					'add_new'					=> 		__( 'Dodaj novi Portfolio', 'piedpiper' ),
					'new_item' 					=> 		__( 'Novi Portfolio', 'piedpiper' ),
					'edit_item' 				=> 		__( 'Uredi Portfolio', 'piedpiper' ),
					'update_item' 				=> 		__( 'Ažuriraj Portfolio', 'piedpiper' ),
					'view_item' 				=> 		__( 'Pogledaj Portfolio', 'piedpiper' ),
					'view_items' 				=> 		__( 'Pogledaj Portfolio', 'piedpiper' ),
					'search_items' 				=> 		__( 'Pretraži Portfolio', 'piedpiper' ),
					'not_found' 				=> 		__( 'Nije pronađeno', 'piedpiper' ),
					'not_found_in_trash' 		=> 		__( 'Nije pronađeno u smeću', 'piedpiper' ),
					'featured_image' 			=> 		__( 'Glavna slika', 'piedpiper' ),
					'set_featured_image' 		=> 		__( 'Postavi glavnu sliku', 'piedpiper' ),
					'remove_featured_image' 	=> 		__( 'Ukloni glavnu sliku', 'piedpiper' ),
					'use_featured_image' 		=> 		__( 'Postavi za glavnu sliku', 'piedpiper' ),
					'insert_into_item' 			=> 		__( 'Umentni', 'piedpiper' ),
					'uploaded_to_this_item' 	=> 		__( 'Preneseno', 'piedpiper' ),
					'items_list' 				=> 		__( 'Lista', 'piedpiper' ),
					'items_list_navigation' 	=> 		__( 'Navigacija među Portfoliom', 'piedpiper' ),
					'filter_items_list' 		=> 		__( 'Filtriranje Portfolia', 'piedpiper' ),
					);
				$args = array(
					'label' 			=> 		__( 'Portfolio', 'piedpiper' ),
					'description' 		=> 		__( 'Portfolio post type', 'piedpiper' ),
					'labels' 			=> 		$labels,
					'supports' 			=> 		array( 'title', 'editor', 'thumbnail', 'revisions' ),
					'hierarchical' 		=> 		false,
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 5,
					'menu_icon' => 'dashicons-universal-access-alt',
					'show_in_admin_bar' => true,
					'show_in_nav_menus' => true,
					'can_export' => false,
					'has_archive' => true,
					'exclude_from_search' => false,
					'publicly_queryable' => true,
					'capability_type' => 'page',
					);
					register_post_type( 'portfolio', $args );
			}
			add_action( 'init', 'registriraj_portfolio_cpt', 0 );
			
			function registriraj_taksonomiju_tip_portfolia() 
			{
					$labels = array(
						'name' => _x( 'Tip', 'Taxonomy General Name', 'piedpiper' ),
						'singular_name' => _x( 'Tip', 'Taxonomy Singular Name', 'piedpiper' ),
						'menu_name' => __( 'Tip', 'piedpiper' ),
						'all_items' => __( 'Svi tipovi', 'piedpiper' ),
						'parent_item' => __( 'Roditeljski tip', 'piedpiper' ),
						'parent_item_colon' => __( 'Roditeljski Tip', 'piedpiper' ),
						'new_item_name' => __( 'Novi tip', 'piedpiper' ),
						'add_new_item' => __( 'Dodaj novi tip', 'piedpiper' ),
						'edit_item' => __( 'Uredi tip', 'piedpiper' ),
						'update_item' => __( 'Ažuiriraj tip', 'piedpiper' ),
						'view_item' => __( 'Pogledaj tip', 'piedpiper' ),
						'separate_items_with_commas' => __( 'Odvojite zvanja sa zarezima', 'piedpiper' ),
						'add_or_remove_items' => __( 'Dodaj ili ukloni tip', 'piedpiper' ),
						'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'piedpiper' ),
						'popular_items' => __( 'Popularni Tip', 'piedpiper' ),
						'search_items' => __( 'Pretraga', 'piedpiper' ),
						'not_found' => __( 'Nema rezultata', 'piedpiper' ),
						'no_terms' => __( 'Nema Tipova', 'piedpiper' ),
						'items_list' => __( 'Lista Tipova', 'piedpiper' ),
						'items_list_navigation' => __( 'Navigacija', 'piedpiper' ),
					);
					$args = array(
						'labels' 			=> 		$labels,
						'hierarchical' 		=> 		true,
						'public' 			=> 		true,
						'show_ui' 			=> 		true,
						'show_admin_column' => 		true,
						'show_in_nav_menus' => 		true,
						'show_tagcloud' 	=> 		true,
					);
					register_taxonomy( 'tip_portfolio', array( 'portfolio' ), $args );
			}
			add_action( 'init', 'registriraj_taksonomiju_tip_portfolia', 0 );






		function daj_zaposlenike()
		{
			$args = array(
			'posts_per_page' => -1,
			'post_type' => 'zaposlenik',
			'post_status' => 'publish'
			);

			$trms = array( 
				'fields' => 'names' 
			);

			$zaposlenici = get_posts( $args );
			$sIstaknutaSlika = "";			
			
			foreach ($zaposlenici as $zaposlenik)
			{
				
				if( get_the_post_thumbnail_url($zaposlenik->ID) )
				{
					$sIstaknutaSlika = get_the_post_thumbnail_url($zaposlenik->ID);
				}
				else
				{
					$sIstaknutaSlika = get_template_directory_uri(). '/img/team-1.jpg';
				}



				$terms = wp_get_post_terms( $zaposlenik->ID, 'naslovna_titula', $trms  );

				foreach($terms as $term){
					
						$kruh = print_r($terms,true);
						$ZaposlenikTitula=implode(", ",$terms);
						
				}	


				$ZaposlenikUrl = $zaposlenik->guid;
				$ZaposlenikNaziv = $zaposlenik->post_title;
				
				$sHtml .= '
				<div class="col-lg-3 col-md-6">
				  <div class="member">
				  <div class="pic"><a href="'.$ZaposlenikUrl.'"><img src="'.$sIstaknutaSlika.'" alt=""></a></div>
						<div class="details">
						<h4><a href="'.$ZaposlenikUrl.'">'.$ZaposlenikNaziv.'</a></h4>
				<span>'.$ZaposlenikTitula.'</span>
				<div class="social">
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-google-plus"></i></a>
				<a href=""><i class="fa fa-linkedin"></i></a>
				</div>
				</div>
			  </div>
			</div>';				
			}
			return $sHtml;
		}

		function daj_portfolio()
		{
			$args = array(
			'posts_per_page' => -1,
			'post_type' => 'portfolio',
			'post_status' => 'publish'

			);
			$portfolio = get_posts( $args );
			foreach ($portfolio as $p)
			{
				$PortfolioUrl = $p->guid;
				$PortfolioNaziv = $p->post_title;
				$sHtml .= '
				<div class="col-lg-3 col-md-4">
				<div class="portfolio-item wow fadeInUp">
				<div class="portfolio-overlay">
				<div class="portfolio-info"><h2 class="wow fadeInUp"><a href="'.$PortfolioUrl.'">'.$PortfolioNaziv.'</a></h2><span>Taksonomija ovdje</span></div>					
                </div>
            </div>
          </div';
			}
			return $sHtml;
		}


?>
