<?php
global $_POST;
$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
if ( ! empty ( $email ) ) {
	$file    = 'email.csv';
	$current = file_get_contents( $file );
	$current .= $email . ';' . '\n';
	file_put_contents( $file, $current );
}