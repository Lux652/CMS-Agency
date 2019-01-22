<?php
require_once('class-wp-bootstrap-navwalker.php');

	if ( ! function_exists( 'inicijaliziraj_temu' ) )
	{
		function inicijaliziraj_temu()
		{
			add_theme_support( 'post-thumbnails' );
			register_nav_menus( array(
				'glavni-menu' => "Glavni navigacijski izbornik",
				'sporedni-menu' => "Izbornik u podnožju",
				'mobile-menu' => "Mobile menu"
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
				'name' => "Glavni sidebar yo",
				'id' => 'glavni-sidebar',
				'description' => "Glavni sidebar",
				'before_widget' => '<div class="card my-4">',
				'after_widget' => "</div>",
				'before_title' => '<h5 class="card-header">',
				'after_title' => '</h5>',
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



function ucitaj_select2_zaposlenici()
{
	wp_enqueue_style( 'select2css', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	wp_enqueue_script('select2js', get_template_directory_uri().'/assets/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('select2-admin_projekt-js', get_template_directory_uri().'/js/zaposlenici_select2.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_select2_zaposlenici' );

function ucitaj_select2_projekti()
{
	wp_enqueue_style( 'select2css', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	wp_enqueue_script('select2js', get_template_directory_uri().'/assets/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('select2-admin_zaposlenik-js', get_template_directory_uri().'/js/projekti_select2.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_select2_projekti' );

function ucitaj_mobile_nav()
{
	wp_enqueue_script('mobile-nav', get_template_directory_uri().'/js/mobile-nav.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_mobile_nav' );

function remove_images( $content ) {
	$postOutput = preg_replace('/<img[^>]+./','', $content);
	return $postOutput;
 }
 add_filter( 'the_content', 'remove_images', 100 );


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
					$ZaposlenikTitula=implode(", ",$terms);					
				}	


				$ZaposlenikUrl = $zaposlenik->guid;
				$ZaposlenikNaziv = $zaposlenik->post_title;
				
				$sHtml .= '
				<div class="col-lg-3 col-md-6">
				  <div class="member">
				  <div class="pic"><a href="'.$ZaposlenikUrl.'"><img src="'.$sIstaknutaSlika.'" alt=""></a></div>
						<div class="details">
						<h4>'.$ZaposlenikNaziv.'</h4>
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
			$sIstaknutaSlika ="";

			$portfolio = get_posts( $args );
			foreach ($portfolio as $p)
			{
				if( get_the_post_thumbnail_url($p->ID) )
				{
					$sIstaknutaSlika = get_the_post_thumbnail_url($p->ID);
				}
				else
				{
					$sIstaknutaSlika = get_template_directory_uri(). '/img/portfolio/8.jpg';
				}

				$PortfolioUrl = $p->guid;
				$PortfolioNaziv = $p->post_title;
				$sHtml .= '
				<div class="col-lg-3 col-md-4 portfolio_container">
				<div class="portfolio-item wow fadeInUp">
				<a href="'.$PortfolioUrl.'" class="portfolio-popup">
				<img src="'.$sIstaknutaSlika.'" alt="">
				<div class="portfolio-overlay">
				<div class="portfolio-info"><h2 class="wow fadeInUp">'.$PortfolioNaziv.'</h2></div>
			  </div>
			  </a>
				</div>
			  </div>';
			}
			return $sHtml;
		}

		function add_meta_box_istaknuti_projekti_zaposlenika(){
			add_meta_box('pp_istaknuti_projekti', 'Istaknuti projekti zaposlenika', 'html_meta_box_istaknuti_projekti_zaposlenika', 'zaposlenik','normal','low');
		}

		add_action( 'add_meta_boxes', 'add_meta_box_istaknuti_projekti_zaposlenika' );

		function html_meta_box_istaknuti_projekti_zaposlenika(){
			wp_nonce_field('spremi_istaknuti_projekt_zaposlenika', 'istaknuti_projekti_zaposlenika_nonce');

			$projekti_ids = get_post_meta($post->ID, 'istaknuti_projekti_zaposlenika', true);
			
			$projekti_ids = explode(',',$projekti_ids);

			$args = array(
				'posts_per_page'  => -1,
				'post_type'		  => 'portfolio',
				'post_status'     => 'publish'
			);

			$projekti = get_posts( $args );

			$projekti_form = '<select name="projekti[]" id="projekti[]" class="s2p" multiple>';

			foreach ($projekti as $projekt){
				$selected_text = (in_array($projekt->ID, $projekti_ids)) ? "selected" : "" ;
				$projekti_form .= '<option '.$selected_text.' value = "'.$projekt->ID.'">'.$projekt->post_title.'</option>';
			}
			
			$projekti_form .='</select>';

			echo '<div> '.$projekti_form.' </div>';	
		}

		function spremi_istaknute_projekte_zaposlenika($post_id){

			$is_autosave = wp_is_post_autosave( $post_id );
			$is_revision = wp_is_post_revision( $post_id );
			$is_valid_nonce_istaknuti_projekti_zaposlenika = ( isset( $_POST[ 'istaknuti_projekti_zaposlenika_nonce' ] ) && wp_verify_nonce( $_POST[ 'istaknuti_projekti_zaposlenika_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
			 if ( $is_autosave || $is_revision || !$is_valid_nonce_istaknuti_projekti_zaposlenika) 
			 {
				 return;
			 }
		
		
			 if(!empty($_POST['projekti']))
			{
				//array u string
				$projekti = implode(",", $_POST['projekti']);
				update_post_meta($post_id, 'istaknuti_projekti_zaposlenika', $projekti);
			}
			else
			{
				delete_post_meta($post_id, 'istaknuti_projekti_zaposlenika');
			}
		}

		add_action( 'save_post', 'spremi_istaknute_projekte_zaposlenika' );



	function daj_htm_istaknuti_projekti_zaposlenika($projekt_id){
		$projekti_ids = get_post_meta($projekt_id, 'istaknuti_projekti_zaposlenika', true);
		if( $projekti_ids != "")
		{
			$projekti_ids = explode(",", $projekti_ids);
			foreach ($projekti_ids as $projekt_id) 
			{
				$projekt = get_post($projekt_id);

				$projekt_slika = ""; 
				if( get_the_post_thumbnail_url($projekt_id) )
				{
					$projekt_slika = get_the_post_thumbnail_url($projekt_id);
				}
				else
				{
					$projekt_slika = get_template_directory_uri() .'/img/portfolio/4.jpg';
				}
			
				$projekt_naziv = $projekt->post_title;
				$projekt_url = $projekt->guid;

				$sHtml .= '
				<a href="'.$projekt_url.'" class="projekt">
				<div class="projekt_slika">
				<img src="'.$projekt_slika.'"</div>
				<h6>'.$projekt_naziv.'</h6>
			</a>';
			}

		}
		else
		{
			$sHtml .= "<p>Nema dodanih istaknutih projekata</p>";
		}
		

		return $sHtml;
} 


function daj_blogpost()
{
	$args = array(
	'posts_per_page' => -1,
	);

	$objave = get_posts( $args );
	$sIstaknutaSlika = "";			
	
	foreach ($objave as $objava)
	{
		
		if( get_the_post_thumbnail_url($objava->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($objava->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/team-1.jpg';
		}


		$objavaUrl = $objava->guid;
		$objavaNaziv = $objava->post_title;
		$objavaAutor=get_bloginfo();
		$autorImg = get_template_directory_uri(). '/img/pp.png';
		$objavaDatum = get_the_date( $format,$objava->ID );
		$objavaVrijeme = get_the_time($format,$objava->ID);
		$objavaContent=get_post_field('post_content', $objava->ID);
		$hehe= wp_trim_words( $objavaContent, 40 );
		$sUrlNaslovnica = get_site_url();
		
		$sHtml .= '
		<div class="objava-header">
		<a href="'.$objavaUrl.'">
		<h1 class="mt-4">'.$objavaNaziv.'</h1>
		</a>
		</div>
		<div> <p> <img class="author-img" src="'.$autorImg.'"> <a href=" '.$sUrlNaslovnica.'">'.$objavaAutor.'</a>  '.$objavaDatum.' '."|".' '.$objavaVrijeme.'</p></div>
		<hr>
		<img class="objava-img" src="'.$sIstaknutaSlika.'" alt="">
		<hr>
		<p>'.$hehe.'</p>
		<hr>
		<br>
		<br>		
	';				
	}
	return $sHtml;
}



function registriraj_usluge_cpt() 
{
		$labels = array(
			'name' 						=> 		_x( 'Usluge', 'Post Type General Name', 'piedpiper' ),
			'singular_name' 			=> 		_x( 'Usluga', 'Post Type Singular Name', 'piedpiper' ),
			'menu_name' 				=> 		__( 'Usluge', 'PiedPiper' ),
			'name_admin_bar' 			=> 		__( 'Usluge', 'piedpiper' ),
			'archives' 					=> 		__( 'Usluge', 'piedpiper' ),
			'attributes' 				=> 		__( 'Atributi', 'piedpiper' ),
			'parent_item_colon' 		=> 		__( 'Roditeljski element', 'piedpiper' ),
			'all_items' 				=> 		__( 'Sve usluge', 'piedpiper' ),
			'add_new_item' 				=> 		__( 'Dodaj novu uslugu', 'piedpiper' ),
			'add_new'					=> 		__( 'Dodaj novu uslugu', 'piedpiper' ),
			'new_item' 					=> 		__( 'Nova usluga', 'piedpiper' ),
			'edit_item' 				=> 		__( 'Uredi uslugu', 'piedpiper' ),
			'update_item' 				=> 		__( 'Ažuriraj uslugu', 'piedpiper' ),
			'view_item' 				=> 		__( 'Pogledaj uslugu', 'piedpiper' ),
			'view_items' 				=> 		__( 'Pogledaj uslugu', 'piedpiper' ),
			'search_items' 				=> 		__( 'Pretraži uslugu', 'piedpiper' ),
			'not_found' 				=> 		__( 'Nije pronađeno', 'piedpiper' ),
			'not_found_in_trash' 		=> 		__( 'Nije pronađeno u smeću', 'piedpiper' ),
			'featured_image' 			=> 		__( 'Glavna slika', 'piedpiper' ),
			'set_featured_image' 		=> 		__( 'Postavi glavnu sliku', 'piedpiper' ),
			'remove_featured_image' 	=> 		__( 'Ukloni glavnu sliku', 'piedpiper' ),
			'use_featured_image' 		=> 		__( 'Postavi za glavnu sliku', 'piedpiper' ),
			'insert_into_item' 			=> 		__( 'Umentni', 'piedpiper' ),
			'uploaded_to_this_item' 	=> 		__( 'Preneseno', 'piedpiper' ),
			'items_list' 				=> 		__( 'Lista', 'piedpiper' ),
			'items_list_navigation' 	=> 		__( 'Navigacija među uslugama', 'piedpiper' ),
			'filter_items_list' 		=> 		__( 'Filtriranje usluga', 'piedpiper' ),
			);
		$args = array(
			'label' 			=> 		__( 'Usluga', 'piedpiper' ),
			'description' 		=> 		__( 'Usluga post type', 'piedpiper' ),
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
			register_post_type( 'usluga', $args );
	}
	add_action( 'init', 'registriraj_usluge_cpt', 0 );


	
	function daj_usluge()
	{
		$args = array(
		'posts_per_page' => -1,
		'post_type' => 'usluga',
		'post_status' => 'publish',
		'orderby' => 'menu_order title',
		'order'   => 'desc',

		);
		$sIstaknutaSlika = get_template_directory_uri(). '/img/portfolio/4.jpg';
		$usluge = get_posts( $args );
		
		foreach ($usluge as $usluga)
		{
			$uslugaURL = $usluga->guid;
			$UslugaNaziv = $usluga->post_title;
			$content=get_post_field('post_content', $usluga->ID);
			$sHtml .= '
			<div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="fa fa-picture-o"></i></div>
			  <h4 class="title"><a href="">'.$UslugaNaziv.'</a></h4>
			  <p class="description">'.$content.'</p>
			  </div>
			  </div>

		  ';
		}
		return $sHtml;
	}

	function daj_stranicu($path){
		$post = get_page_by_path($path);
		$content = apply_filters('the_content', $post->post_content);
		echo $content;
	}

	function themename_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'themename_custom_logo_setup' );




	function kreiraj_frontpage_shortcode($atts){
		$text1 = $atts['text1'];
		$text2 = $atts['text2'];
		$slika_url = $atts['slika_url'];
		$gumb1_text = $atts['gumb1_text'];
		$gumb1_url = $atts['gumb1_url'];
		$gumb2_text = $atts['gumb2_text'];
		$gumb2_url = $atts['gumb2_url'];

		$sHtml = '<div class="intro-content">
				<h2>'.$text1.'<span>'.$text2.'</span></h2>
				<div>
					<a href="'.$gumb1_url.'" class="btn-get-started">'.$gumb1_text.'</a>
					<a href="'.$gumb2_url.'" class="btn-projects">'.$gumb2_text.'</a>
				</div>
				</div>

				<div id="intro-carousel">
				<div class="item" style="background-image: url('.$slika_url.');">

				</div>';
		return $sHtml;
	}
	add_shortcode('front_page', 'kreiraj_frontpage_shortcode');

	
?>




