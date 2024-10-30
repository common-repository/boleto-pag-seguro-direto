<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$meta_key = '[form-dados-do-boleto]';
global $wpdb;
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[form-dados-do-boleto]'" );
if ($post_id) {
wp_delete_post( $post_id, true );
echo __('First page reset successfully.', 'boleto-pag-seguro-direto').'<br>';
}
$meta_key = '[form-dados-do-boleto-confirma]';
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[form-dados-do-boleto-confirma]'" );
if ($post_id) {
wp_delete_post( $post_id, true );
echo __('Second page successfully redefined.', 'boleto-pag-seguro-direto').'<br>';
}
$meta_key = '[pagamento-boleto]';
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[pagamento-boleto]'" );
if ($post_id) {
wp_delete_post( $post_id, true );
echo __('Third page successfully redefined.', 'boleto-pag-seguro-direto').'<br>';
}

?>
