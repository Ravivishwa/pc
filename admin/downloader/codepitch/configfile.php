<?php
/* Database configuration */
//define('DB_HOST','localhost');
//define('DB_USER','fastprin_1');
//define('DB_PASSWORD','Vs9627409889');
//define('DB_NAME','fastprin_1');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','pancard');



/* site hash */
define('SITE_HASH','4223AC45D4A9166932EE2262A4956');
function print_a($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function asset_url($url)
{
	return 'http://localhost/pancard/admin/'.$url;
}
