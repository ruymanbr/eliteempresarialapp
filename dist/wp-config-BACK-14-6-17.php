<?php
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
define('DB_NAME', 'boowebho_rbrwp');

/** MySQL database username */
/**define('DB_USER', 'boowebho_rbrwp');**/
define('DB_USER', 'root');

/** MySQL database password */
/**define('DB_PASSWORD', '644pS76.4]');**/
define('DB_PASSWORD', 'fisica0710.-');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ydkfpfhw8grst4iwtxomoxqzgahl6f3xkn3ev2ysrvdncu9o9emov7xjv7jp1zh3');
define('SECURE_AUTH_KEY',  'ccwkd1vlzswzch0tsbimx26h4b2b1mx7ti27ljgns49ufxblu6ay7awxufwmksxq');
define('LOGGED_IN_KEY',    'szvpgce0hbqklgucbfz7qvdp78hhl9nssrw6psdke0s1ti415wicj0xrzv8xibid');
define('NONCE_KEY',        'uplgowi1jnbbupziowsvpbtdqxo1rfvq75yxdwnwckqfximnjzy8vkp1souekkif');
define('AUTH_SALT',        'se8xawprwrnsuatmeglynddca5pvojmadj3kua6ljosk0b1kcuoz0dxcipgjcl6o');
define('SECURE_AUTH_SALT', 'dueosequdnlvwwb74p5afdxk7edmmcnjdybithqdbuylrhibv0gohzkj1fhh2k1q');
define('LOGGED_IN_SALT',   'h3plhyglf044qci48nwv4h5y0kjvvataia0nriyy6krafodangro8emicn8ucley');
define('NONCE_SALT',       '77qepoifd8290lgpzjnxgcf0oa1yinvojevq7pxiyxgiaifai3zi7jyzmazeueno');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rbrwp_';

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
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'DISALLOW_FILE_EDIT', true );
define (' AUTOMATIC_UPDATER_DISABLED', true );
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
