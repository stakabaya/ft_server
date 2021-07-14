	<?php
define( 'DB_NAME', 'wp' );
define( 'DB_USER', 'wordpress' );
define( 'DB_PASSWORD', 'password' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define('AUTH_KEY',         'l:9h|0o7*NHG4fnSW|I$jS|[M_tKz)P:+;D:c199!E>YN~VubDt2+}60a`_|swu;');
define('SECURE_AUTH_KEY',  ']@V(~g1C,VnpleK:h;yG!}dlOf/hN,K0ZQ!d1S1gMH*zv)RU}We!R_Klng-sF)bp');
define('LOGGED_IN_KEY',    'lgg9I&0gqY)qU7.F+s%rX}0ZJAyn(=F9#|o2L7EmH%ozdWb._G`q:D@FZK(aiWC,');
define('NONCE_KEY',        'j,:R6JP{DjEF^9cvp.Hz+QQ9~ON<>w-Sy+Jb(TXvMFBAM)wB@oG<9Z>}VQ@{XW%b');
define('AUTH_SALT',        '6)9R2ukbhZFRAygPTyt$:7O4PIKt.k)|:;Y,Q]7%e^y }^&Z5d`1e;vH2Ws-K`L+');
define('SECURE_AUTH_SALT', 'hMOYO9?OMaLUZ-Y&<uo$Kp*+.;TBo4~GJ4]G%e.U!i^m,w!6i)rG:>Lvq7-bmdKh');
define('LOGGED_IN_SALT',   '-<xYj&?r|LV-WQ2xgV}IWIwz!q]kq@+3FrI0k_<g8}eRD>4feT9g HPR*b&V|q.H');
define('NONCE_SALT',       'L|!u;98y3tBgB!?fGVFh:>s25LnBwVO8M}Tgk</8PWGNRqF|#6Yak_~T`4%X`!{!');

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once(ABSPATH . 'wp-settings.php');
