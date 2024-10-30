<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$meta_key = '[pagamento-boleto]';
$post_content = '[pagamento-boleto]';
$post_meta = '[pagamento-boleto]';
$post_title = 'Boleto PagSeguro Direto - Boleto gerado';
$post_name = 'pagamento-boleto';
// create page
global $wpdb;
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = $meta_key" );
if (!$post_id_p) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' =>  $post_title,
'post_name' => $post_name,
'post_content' => $post_content,
'post_status' => 'publish',
'comment_status' => 'closed',   
'ping_status' => 'closed',      
));
if ($post_id) {
add_post_meta($post_id, $post_meta, $post_name);
}
}
?>
