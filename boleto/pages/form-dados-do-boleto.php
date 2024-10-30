<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
$meta_key = '[form-dados-do-boleto-confirma]';
$post_id = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$meta_key'" );
include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/formata.php');
?>
<p>
<img src="<?php echo plugins_url( '/boleto-pag-seguro-direto/images', '' ); ?>/icon-128x128.png" width="128" height="128">
</p>
<form name="form1" action="<?php echo get_page_link($post_id); ?>" method="post" >
<?php wp_nonce_field( 'nonce_boleto_pag_seguro_direto', 'nonce_boleto_pag_seguro_direto_form' ); ?>

  <p><?php echo _e('Value', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="valor"  onkeypress="mascara(this, mvalor);" type="text" id="valor" required>
  </p>
  
    
   <p><?php echo _e('Due: 1 to 30 days. Ex: 20-12-2018', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="vencimento"  onkeypress="mascara(this, mdata);" type="text" id="vencimento" value="<?php echo date("d-m-Y", strtotime("+1 days", time())); ?>" maxlength="10" required>
  </p>
  
  
  <p><?php echo __('Name','boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="nome" type="text" id="nome" required>
  </p>
  <p><?php echo _e('Email', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="email" type="text" id="email" required>
  </p>
  <p><?php echo _e('Zip Code', 'boleto-pag-seguro-direto'); ?></p>
  <p> 
    <input name="cep" type="text" id="cep"  onkeypress="mascara(this, mcep);" maxlength="8" required>
  </p>
  <p><?php echo _e('Cell phone', 'boleto-pag-seguro-direto'); ?></p>
  <p> 
    <input name="telefone" type="text" id="telefone" onkeypress="mascara(this, mtel);" maxlength="15" required>
  </p>
  <p><?php echo _e('CPF', 'boleto-pag-seguro-direto'); ?></p>
  <p>
    <input name="cpf" type="text" id="cpf"  onkeypress="mascara(this, mcpf);" maxlength="11" required>
  </p>
  <p><?php echo _e('To generate a card with monthly and sequential maturities, report the number of installments; or leave only 1', 'boleto-pag-seguro-direto'); ?></p>
 <p><?php echo _e('Up to 12', 'boleto-pag-seguro-direto'); ?></p>
    
  <p>
    <input name="parcelas" type="text"  onkeypress="mascara(this, mnum);" id="parcelas" value="1" maxlength="2" required>
  </p>
  <p><br>
  <?php
  $value1 = rand(1,5); 
  $value2 = rand(1,5); 
    ?> 
    <input name="value1" type="text" id="value1" value="<?php echo $value1; ?>" size="5" maxlength="1" readonly="true" >
    + 
    <input name="value2" type="text" id="value2" value="<?php echo $value2; ?>" size="5" maxlength="1" readonly="true" > =
	
	<input name="value3" type="text" id="value3" value="" size="5" maxlength="2" required >
  </p>
  <p>
    <input type="submit" name="Submit" value="<?php echo _e('Continue', 'boleto-pag-seguro-direto'); ?>">
  </p>
</form>