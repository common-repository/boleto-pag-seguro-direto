<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/functions.php');
global $wpdb;
$meta_key = '[pagamento-boleto]';
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$meta_key'" );
include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/formata.php');
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
	
	
	$cpf_cliente  = $_POST['cpf'];	
	valid_field_cpf_cliente_bpsd($cpf_cliente);
	
		
	if(isset($_POST['valor'])){
	$valor = $_POST['valor'];
	}	
	valid_field_valor_bpsd($valor);
		
	$parcelas = sanitize_text_field($_POST['parcelas']);
	valid_field_parcelas_bpsd($parcelas);
	
	
	if(isset($_POST['vencimento'])){
	$vencimento = $_POST['vencimento'];
	}
	valid_field_vencimento_bpsd($vencimento);
	
	
	
?>
<p>
<img src="<?php echo plugins_url( '/boleto-pag-seguro-direto/images', '' ); ?>/icon-128x128.png" width="128" height="128">
</p>
<form name="form1" action="<?php echo get_page_link($post_id); ?>" method="post" >
<?php wp_nonce_field( 'nonce_boleto_pag_seguro_direto', 'nonce_boleto_pag_seguro_direto_form' ); ?>

  <p><?php echo _e('Value', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="valor" type="text" id="valor" value="<?php echo $valor; ?>" required readonly="true">
  </p>
  
    
   <p><?php echo _e('Due: 1 to 30 days. Ex: 20-12-2018', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="vencimento"  onkeypress="mascara(this, mdata);" type="text" id="vencimento" value="<?php echo date("d-m-Y", strtotime($vencimento)); ?>"  readonly="true">
  </p>
  
  
  <p><?php echo __('Name','boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="nome" type="text" id="nome" value="<?php echo $nome; ?>"  readonly="true">
  </p>
  <p><?php echo _e('Email', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="email" type="text" id="email" value="<?php echo $email_cliente; ?>"  readonly="true">
  </p>
  
 <?php include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/consulta-cep.php');?>
  

  <p><?php echo _e('Cell phone', 'boleto-pag-seguro-direto'); ?></p>
  <p> 
    <input name="telefone" type="text" id="telefone" onkeypress="mascara(this, mtel);" maxlength="15" value="<?php echo $telefone; ?>"  readonly="true">
  </p>
  <p><?php echo _e('CPF', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="cpf" type="text" id="cpf"  onkeypress="mascara(this, mcpf);" maxlength="11" value="<?php echo $cpf_cliente; ?>"  readonly="true">
  </p>
  <p><?php echo _e('Number of installments', 'boleto-pag-seguro-direto'); ?></p>
   
  <p>
    <input name="parcelas" type="text"  onkeypress="mascara(this, mnum);" id="parcelas" maxlength="2" value="<?php echo $parcelas; ?>"  readonly="true">
  </p>
  <p><br>
  <?php
  $value1 = $_POST['value1']; 
  $value2 = $_POST['value2']; 
  $value3 = $_POST['value3'];
  ?> 
    <input name="value1" type="hidden" id="value1" value="<?php echo $value1; ?>" size="5" maxlength="1" required readonly="true" >
    
    <input name="value2" type="hidden" id="value2" value="<?php echo $value2; ?>" size="5" maxlength="1" required readonly="true" > 
	
	<input name="value3" type="hidden" id="value3" size="5" maxlength="2" value="<?php echo $value3; ?>" required  readonly="true">
  </p>
  
  <p>
    <input type="submit" name="Submit" value="<?php echo _e('Continue', 'boleto-pag-seguro-direto'); ?>"></p> 
	
  <p>
  	<input type="button" name="Button" onClick="javascript:history.back()" value="<?php echo _e('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'boleto-pag-seguro-direto'); ?>">
  </p>
  
</form>