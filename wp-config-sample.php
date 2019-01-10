<?php
/**
 * Temeljna konfiguracija WordPressa.
 *
 * wp-config.php instalacijska skripta koristi ovaj zapis tijekom instalacije.
 * Ne morate koristiti web stranicu, samo kopirajte i preimenujte ovaj zapis
 * u "wp-config.php" datoteku i popunite tražene vrijednosti.
 *
 * Ovaj zapis sadrži sljedeće konfiguracije:
 *
 * * MySQL postavke
 * * Tajne ključeve
 * * Prefiks tablica baze podataka
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL postavke - Informacije možete dobiti od vašeg web hosta ** //
/** Ime baze podataka za WordPress */
define('DB_NAME', 'ovdje_upisite_ime_baze');

/** MySQL korisničko ime baze podataka */
define('DB_USER', 'ovdje_upisite_korisnicko_ime');

/** MySQL lozinka baze podataka */
define('DB_PASSWORD', 'ovdje_upisite_lozinku');

/** MySQL naziv hosta */
define('DB_HOST', 'localhost');

/** Kodna tablica koja će se koristiti u kreiranju tablica baze podataka. */
define('DB_CHARSET', 'utf8');

/** Tip sortiranja (collate) baze podataka. Ne mijenjate ako ne znate što radite. */
define('DB_COLLATE', '');

/**#@+
 * Jedinstveni Autentifikacijski ključevi (Authentication Unique Keys and Salts).
 *
 * Promijenite ovo u vaše jedinstvene fraze!
 * Ključeve možete generirati pomoću {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org servis tajnih-ključeva}
 * Ključeve možete promijeniti bilo kada s tim da će se svi korisnici morati ponovo prijaviti jer kolačići (cookies) neće više važiti nakon izmjene ključeva.
 *
 * @od inačice 2.6.0
 */
define('AUTH_KEY',         'ovdje unesite svoju jedinstvenu frazu');
define('SECURE_AUTH_KEY',  'ovdje unesite svoju jedinstvenu frazu');
define('LOGGED_IN_KEY',    'ovdje unesite svoju jedinstvenu frazu');
define('NONCE_KEY',        'ovdje unesite svoju jedinstvenu frazu');
define('AUTH_SALT',        'ovdje unesite svoju jedinstvenu frazu');
define('SECURE_AUTH_SALT', 'ovdje unesite svoju jedinstvenu frazu');
define('LOGGED_IN_SALT',   'ovdje unesite svoju jedinstvenu frazu');
define('NONCE_SALT',       'ovdje unesite svoju jedinstvenu frazu');

/**#@-*/

/**
 * Prefix WordPress tablica baze podataka.
 *
 * Možete imati više instalacija unutar jedne baze podataka ukoliko svakoj dodjelite
 * jedinstveni prefiks. Koristite samo brojeve, slova, i donju crticu!
 */
$table_prefix  = 'wp_';

/**
 * Za programere: WordPress debugging mode.
 *
 * Promijenit ovo u true kako bi omogućili prikazivanje poruka tijekom razvoja.
 * Izrazito preporučujemo da programeri dodataka (plugin) i tema
 * koriste WP_DEBUG u njihovom razvojnom okružju.
 *
 * Za informacije o drugim konstantama koje se mogu koristiti za debugging,
 * posjetite Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To je sve, ne morate više ništa mijenjati! Sretno bloganje. */

/** Apsolutna putanja do WordPress mape. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Postavke za WordPress varijable i već uključene zapise. */
require_once(ABSPATH . 'wp-settings.php');
