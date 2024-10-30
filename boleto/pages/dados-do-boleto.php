<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/functions.php');
if ( 
    ! isset( $_POST['nonce_boleto_pag_seguro_direto_form'] ) 
    || ! wp_verify_nonce( $_POST['nonce_boleto_pag_seguro_direto_form'], 'nonce_boleto_pag_seguro_direto' ) 
) {
	echo '<a href="javascript:history.back()">'.__('Sorry, your session has expired. Please go back and try again.', 'boleto-pag-seguro-direto').'</a>';
   exit;
} else {
   $value1 = sanitize_text_field($_POST['value1']); 
  $value2 = sanitize_text_field($_POST['value2']);
  $value3 = sanitize_text_field($_POST['value3']); 
  
  $value4 = $value1 + $value2;
}	
valid_some_bpsd($value1,$value2,$value3,$value4);

$nome  = sanitize_text_field($_POST['nome']);	
	valid_field_nome_bpsd($nome);
	
	
	$email_cliente  = sanitize_email($_POST['email']);
	valid_field_email_cliente_bpsd($email_cliente);
	
	$telefone  = sanitize_text_field($_POST['telefone']);
	valid_field_telefone_bpsd($telefone);
	
	$logradouro  = sanitize_text_field($_POST['logradouro']);
	valid_field_logradouro_bpsd($logradouro);
	
	$numero  = sanitize_text_field($_POST['numero']);
	valid_field_numero_bpsd($numero);
	
	$complemento  = sanitize_text_field($_POST['complemento']);
	valid_field_complemento_bpsd($complemento);
	
	$bairro  = sanitize_text_field($_POST['bairro']);
	valid_field_bairro_bpsd($bairro);
	
	$cep  = sanitize_text_field($_POST['cep']);
	$cidade  = sanitize_text_field($_POST['cidade']);
	$uf  = sanitize_text_field($_POST['uf']);
	
	
	
	$cpf_cliente  = $_POST['cpf'];	
	valid_field_cpf_cliente_bpsd($cpf_cliente);
	
		
	if(isset($_POST['valor'])){
	$valor = $_POST['valor'];
	
	
	
	$valor =  BpsdFormataValorPagSeguro($valor)*1;
	}
	
	if(get_option( 'BoletoPagSeguroDireto_Plugin_ETextInput' )=="no") {
	$valor =  $valor - 1;
	}
	
	$valor = number_format($valor,2,".",",");
		
	$parcelas = sanitize_text_field($_POST['parcelas']);
	valid_field_parcelas_bpsd($parcelas);
	
	
	if(isset($_POST['vencimento'])){
	$vencimento = $_POST['vencimento'];
	}
	valid_field_vencimento_bpsd($vencimento);
	
	
	$vencimento =  date("Y-m-d", strtotime($vencimento));
	
	$telefone = BpsdFormataTelefone($telefone);
	
	$ddd	= substr($telefone, 0, 2);
	$fone 	= substr($telefone, 2);
	
	
	


?>