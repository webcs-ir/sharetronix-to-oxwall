<?php
function rand_string($length) {
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ){
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
	return $str;
}
?>
