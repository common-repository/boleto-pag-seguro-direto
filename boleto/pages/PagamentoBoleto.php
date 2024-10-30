<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
error_reporting(0);
global $wpdb;
$email_loja = get_option( 'BoletoPagSeguroDireto_Plugin_ATextInput' );
$token_loja = get_option( 'BoletoPagSeguroDireto_Plugin_BTextInput' );
$nome_loja = get_option( 'BoletoPagSeguroDireto_Plugin_CTextInput' );
$ambiente = get_option( 'BoletoPagSeguroDireto_Plugin_DTextInput' );
$code = "";
$body = "";
$success = "";

include( BOLETO_PAG_SEGURO_DIRETO_DIR  .'boleto/pages/dados-do-boleto.php' );
include( BOLETO_PAG_SEGURO_DIRETO_DIR  .'boleto/pages/Boleto.php' );
switch($ambiente){
case 'sandbox':
Config::setAccountCredentials($email_loja, $token_loja, true); // sandbox
echo __('This system does not work in sandbox ', 'boleto-pag-seguro-direto').'<br>';
echo __('Go to the Wordpress Admin Panel; Plugins; Boleto Pag Seguro Seguro and change preferences.', 'boleto-pag-seguro-direto').'<br>';
echo __('Needing a little help? I can help.', 'boleto-pag-seguro-direto').'<br><br>';
echo '<a href="'.get_admin_url().'plugins.php?page=BoletoPagSeguroDireto_PluginSettings">';
echo __('SETTINGS', 'boleto-pag-seguro-direto').' </a><br><br>';
echo __('Take a quiz generating a donation for this plugin and get free support.', 'boleto-pag-seguro-direto').'<br>';
echo '<a href="https://entregador.click/wordpress-works/form-dados-do-boleto/">';
echo __('Click here to help!', 'boleto-pag-seguro-direto').' </a><br><br>';
echo __('Generates the Boleto Pag Seguro Direto without typing the password. Documents in sequential order from 1 to 12. Version 0.5+ update settings', 'boleto-pag-seguro-direto').'<br>';



//exit;
break;

case 'production':


//Config::setProduction();
Config::setAccountCredentials($email_loja, $token_loja, false); // producao


$descricao = $nome.' '.$cpf_cliente;

$boleto = new Boleto();
$boleto->setAmount($valor);
$boleto->setDescription($descricao);
$boleto->setCustomerCPF($cpf_cliente);
// $boleto->setCustomerCNPJ('33085736000169');
$boleto->setCustomerName($nome);
$boleto->setCustomerEmail($email_cliente);

$boleto->setCustomerPhone($ddd, $fone);

$instrucoes = __('Document ', 'boleto-pag-seguro-direto').' / '.$descricao.' - '.strtoupper($nome_loja);
$instrucoes = substr($instrucoes, 0, 99);


$boleto->setFirstDueDate($vencimento);
$boleto->setNumberOfPayments($parcelas);
$boleto->setReference($cpf_cliente.'-'.$parcelas);//**
$boleto->setInstructions($instrucoes);
$boleto->setCustomerAddressPostalCode($cep);
$boleto->setCustomerAddressStreet($logradouro);
$boleto->setCustomerAddressNumber($numero);
$boleto->setCustomerAddressDistrict($bairro);
$boleto->setCustomerAddressCity($cidade);
$boleto->setCustomerAddressState($uf);
$data = $boleto->send();
$conta = 1;
$errors = ($data->errors);


	if($errors){
	foreach($data->errors as $value){
	$code = $value->code;
	}
	get_error_message( $code );
	}
	

	
	
if(!$code){
	foreach ($data->boletos as $row) {
		$success = 1;
		
		$code = $row->code;
		$barcode = $row->barcode;
		
	$body .= '<h3> '. __('Document n# ', 'boleto-pag-seguro-direto').$conta.'</h3>';
	$body .= '<h5><a href="https://pagseguro.uol.com.br/checkout/imprimeBoleto.jhtml?resizeBooklet=n&code='.$code.'" target="_blank">'. __('Click here to print the document.', 'boleto-pag-seguro-direto').' </a></h5>';
	$body .= '<h5>'. __('Bar Code: ', 'boleto-pag-seguro-direto').$barcode.'</h5><br>';
	$conta = $conta + 1;
	}

}	

	if($success==1){
	$body .=  __('You will receive an email with transaction data. ', 'boleto-pag-seguro-direto') .$email_cliente.'<br>' ;
	} // end if($success==1)



echo $body;

?>
<script>
window.addEventListener('keydown', function (e) {
    var code = e.which || e.keyCode;
    if (code == 116) e.preventDefault();
    else return true;
    alert("<?php echo __('It looks like you already generated this document (s). Check your email to confirm. If I`m wrong you should go back to the form and start over. Excuse me.', 'boleto-pag-seguro-direto');?>");
});</script>

<?php
break;
}
?>