<?php
global $_POST;
$mail_to = 'yourpersonalemail@gmail.com'; //Your email here

// Required fields
$email = isset( $_POST['email'] ) ? strip_tags( trim( $_POST['email'] ) ) : '';
$name  = isset( $_POST['name'] ) ? strip_tags( trim( $_POST['name'] ) ) : '';
$text  = isset( $_POST['message'] ) ? strip_tags( trim( $_POST['message'] ) ) : '';
// Additional fields
$subject   = isset( $_POST['subject'] ) ? strip_tags( trim( $_POST['subject'] ) ) : '';
$permalink = isset( $_POST['permalink'] ) ? strip_tags( trim( $_POST['permalink'] ) ) : '';
$phone     = isset( $_POST['phone'] ) ? strip_tags( trim( $_POST['phone'] ) ) : '';
$company   = isset( $_POST['company'] ) ? strip_tags( trim( $_POST['company'] ) ) : '';


$mail_subject = $subject != '' ? $subject : 'From Contact form on website';

$message = '<h3>You got a mail from website:</h3>' . '<br/>';
$message .= '<b>Name:</b> ' . $name . '<br/>';
$message .= '<b>Email:</b> ' . $email . '<br/>';

if ( ! empty( $permalink ) ) {
	$message .= '<b>Website:</b> ' . $permalink . '<br/>';
}
if ( ! empty( $phone ) ) {
	$message .= '<b>Phone:</b> ' . $phone . '<br/>';
}
if ( ! empty( $company ) ) {
	$message .= '<b>Company:</b> ' . $company . '<br/>';
}

$message .= '<b>Message:</b> ' . $text . '<br/>';
$headers = 'MIME-Version: 1.0' . '\r\n';
$headers .= 'Content-type:text/html;charset=UTF-8' . '\r\n';

// More headers
$headers .= 'From: "'.$name.'"<' . $email . '>' . '\r\n';

mail( $mail_to, $mail_subject, $message, $headers );
