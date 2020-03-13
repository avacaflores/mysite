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

$connectstr_dbhost = 'localhost';
$connectstr_dbname = 'local';
$connectstr_dbusername = 'root';
$connectstr_dbpassword = 'root';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

//echo $connectstr_dbhost;exit;
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'local'); 
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD', $connectstr_dbpassword);

/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);





// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define( 'DB_NAME', 'localdb' );

/** MySQL database username */
//define( 'DB_USER', 'root' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
//define( 'DB_HOST', 'localhost:51571' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xGAak3UPlmvMBEMi0zGNlX66kxlg7lligzvhz0/Cw3Fd4EgSFhsmvjStu25HKeNx2SSqHItDzp3MhLB4LkrpTA==');
define('SECURE_AUTH_KEY',  'aXc5QrO1PTRQvNLBgV6vWeRiz2mNnfO22VAUxB2px1NYJ+Ug1s+UkvEwYVLYvKaNWyG4SpBNDUHmgJSqB61CsA==');
define('LOGGED_IN_KEY',    'mUnPXnZuGm9/2T28+o5X29pkLYjbteAjbDDInIyodXtkqdmqTDfhNNSCtWByEHh1pKXxkLaYoPVzsMyXy3gZjw==');
define('NONCE_KEY',        'U/pYlqeQD70zH4Jebl77TkmDRcMaJyV0iEGG3ojewk+d9sXmdO0hOA8xYcH/nZ2u954TOhe3IptGYZlngFq+1g==');
define('AUTH_SALT',        'xgGIzSMuaCkUuQPxdFy6ygP5Fo0Y7ZclrT6M6OyTQCrU8c5G6lwJsfN4MXtW+beaPGwxWNHxv/v2z01aPW+1bA==');
define('SECURE_AUTH_SALT', 'BAElUl57AHiZR9EOfUoj8xO8G0bvyangNNlx6qunBQKKNssTo0dVLmPYkCWmSqe1gaOLpxk0tygQR2oTiM7I6w==');
define('LOGGED_IN_SALT',   'ELAsnGWH8BYVLCsyXcmkj1DRHG84essTcr2tKeXfg6sGR4OaP5mn0LAaA8/jcnnLyGczxdENkkYXPqDBCogkVw==');
define('NONCE_SALT',       'Nkhq2LlRUEwrW0Jk6w4l834Z/N0xeV3HyH1WCn3jpsB9UsktRYVxZDx4YVqcJVjEt72hGnmos101jNcACaZtsw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
