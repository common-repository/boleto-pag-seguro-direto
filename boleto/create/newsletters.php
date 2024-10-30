<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
$option_news = get_option( 'BoletoPagSeguroDireto_Plugin_FTextInput' );
if ($option_news=="Yes") {
$user = wp_get_current_user();
$user = $user->roles[0];
$user_info = get_userdata($user);
$user_email = $user_info->user_email;
$subject = get_bloginfo('name');
$subject .= " - New user in Newsletters";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.get_bloginfo("name").' <'.$user_email.'>' . "\r\n";
$message .= "User Email: ".$user_email."<br>";
$url_link = site_url();
$message .=  '<a href="'.$url_link.'">'.get_bloginfo("name").'</a> <br><br>';
$message .= get_bloginfo('name');
wp_mail( 'clodoaldoevangelista@gmail.com', $subject, $message, $headers );
}
?>