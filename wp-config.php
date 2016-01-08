<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'rion');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'rion');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'bzmaxrL6ZjbWvH6y');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's%&P,._g=/#km9-~EZCtJ]ZIM+_IPI1[@ukKUL#mt]|(bLjOWNKd:s (C#lXLbc&');
define('SECURE_AUTH_KEY',  '`|H5;iE3w!<bdn|pQIL=0x(H0+s`85{;uI.uGY)cRc<7%z({zU.2(TJ-@$(Nz3.=');
define('LOGGED_IN_KEY',    'q#@%_K766BvfGVWe_u+(w.$u;Twz7gO2BGJW>&<n,.y]anH>S&jOR|f7l*i[UQ?t');
define('NONCE_KEY',        'gM.E?51a8=geF)Gia?(-DRM>m@2+m#mR*Xfs<$oJ3nb#+jeZ4Rw6}6|9=LF=J+X7');
define('AUTH_SALT',        'Xrfzi4P]bz+G(^xg+83h$k.?cXU!YrMlsz>-zjlI~&c39z9P_WFH_TT&#I,x/Wfw');
define('SECURE_AUTH_SALT', '+L[UxXUi`1ycW +qF+m?*5E^0dsb6^1!91!YZStvMJ%HC:=dnp]:c8AgEp3vOyhx');
define('LOGGED_IN_SALT',   'blwj3F`3f73tYlAU_N_gOH&_x<V]>lX|SLhz#k*o VES[o5o1,_B^ tJ+$I gZuO');
define('NONCE_SALT',       'Rl[FA@!27fW*6>OMelB6TW:31a2Gvjz*Q&g#&TD1+s()%ITw3c<PWP}$VD7[;I&t');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'dez4fe4r_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');