<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_kik3bi2cac');

/** MySQL database username */
define('DB_USER', '1kswOhju23SnofU');

/** MySQL database password */
define('DB_PASSWORD', 'MVtpPtkD6yZtbPTP');

/** MySQL hostname */
define('DB_HOST', 'moncheri14.ipowermysql.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'QzF()bAwqs>!e=fw;|FFljlwHjHbVDNoPZtbk}tDkQ%XnA=H?us$*wJWMJ^jqhHqo!/H^pC<dI!HM]W(Oq[;{Gsm+%]<d*L?H_mKX>-octQqI/F>lKTyIeEKkmXb=OPn');
define('SECURE_AUTH_KEY', '$kq$lHwDTB+ZFck(GO]+VmRb;aRR@{u}{?JD+A&OezoB[/Wn-+<V/[]N-tCwTF?stpvcaY]+zFEa}sJC^|>=CTg@<y$Wnv;l^S_EHj@+XjRBEUhcuH}M^blQTyXA{}np');
define('LOGGED_IN_KEY', 'o(pwO%>(COdOVWYXAK*;$aJP>w{t^PAA@i-h)OI&hp;Z?gKAUSXoqY}cUnNuseXYw_pJ_Y>F]EGkKLn*jQZ(G$&%TSN)ji/NCEFm@|h(H)y!]CmrLew[dbJyLSBGgvE/');
define('NONCE_KEY', 'I((oRn)OA^{DGYACfGr%I+EAfNz=iFS>T/by*XD|(?RcB?*qo@z](HS^-DvRwbIEkMpkfqBq]BWuNhSlYP/%n@tSueT|XJYKkzE;;JO*ihl>=$HnFG*|*BsdD(h+GDFy');
define('AUTH_SALT', 'uuIjnk_@XQQZ=GrBeF?](E?-RwlwDlnS!TTWkV@NSkLKJwB&U]!I_ljnJXgYQ>}d}+mrmUN>UmUj_%?+mJLo-QkV*PP};^uh<(A/mXM=ZL-{<ja^BqFb_U>[YuYRdvq@');
define('SECURE_AUTH_SALT', '(YOSxuIZDUHoFegpUADvcp*_HSZJMOb+[]Xa-mI]awdRa$yt)TcQI(Mc_|p&W&[y!<LZ=ThsbL-ZxH!FWs^wA+-}NYuLMuCc/xL*ylUj^b!$R}QI}ShiHI%fUmLf%wS+');
define('LOGGED_IN_SALT', '}]lbw&<ywVszT[W/vDjUExrcArBg+&fQk=HTqmexk+gasC|ZClH}xhGkMIc^[j_*nCcJbR<_bd_jreQrff]B(Lz@jqy)|!QpGbSo){bqk[H&;FdN;PNT&YFs)X}^qHJA');
define('NONCE_SALT', 'm](P}oUjhvzJgV(ohZUk+Id}!]=+ky]?NriDLGFutMUQrnh$P-m@%nR>it/ttoqt-@arbYzgu&C+)Ocmkw%KFPXr&EyB>?y;Qxu{bXH%bXB<zeXQ{EPHyH=IAnctc$Zy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_kcph_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
