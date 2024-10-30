<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$logradouro = '';
$numero = '' ;
$bairro = '' ;
$cidade = '' ;
$uf = '';
	
	$cep  = sanitize_text_field($_POST['cep']);
	if($cep == ""){
	echo '<a href="javascript:history.back()">'.__('Back and correct Zip Code', 'boleto-pag-seguro-direto').'</a>';
	exit;
	}
	
	$preencher_endereco_automatico = get_option( 'BoletoPagSeguroDireto_Plugin_GTextInput' );
	
if($preencher_endereco_automatico=="yes"){
	
	$clientSoap = new SoapClient( "https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl" );
	$params = array ('cep' => $cep);
			
			
	$result = $clientSoap->consultaCEP($params);
	foreach($result as $value) {
	$logradouro = $value->end ;
	$numero = $value->complemento2 ;
	$bairro = $value->bairro ;
	$cidade = $value->cidade ;
	$uf = $value->uf;
	}

}

$logradouro = ucwords($logradouro);
if($logradouro==' '){
$logradouro = '';
}

$bairro = ucwords($bairro);
if($bairro==' '){
$bairro = '';
}

if($numero==' '){
$numero = '';
}

$cep= str_replace("_","",$cep);
$cep = str_replace("-","",$cep);
$cep = str_replace(".","",$cep);

//$cidade = BpsIso($cidade);
$cidade = ucwords($cidade);
if($logradouro==""){
$logradouro="NAO INFORMADA";
}
if($numero==""){
$numero="S/N";
}
if($bairro==""){
$bairro="NAO INFORMADO";
}
$uf = strtoupper($uf);
?> 
  <?php 
  	if(strlen($logradouro < 5 OR $logradouro > 130)){
	echo __('Please enter the Address valid! 5 to 130 alphanumeric characters', 'boleto-pag-seguro-direto').'</a>';
	}
	; ?>
	
  <p><?php echo _e('Address', 'boleto-pag-seguro-direto'); ?></p>
  <p> 
    <input name="logradouro" type="text" id="logradouro" value="<?php echo $logradouro; ?>" maxlength="130" required>
  </p>
  
    <?php 
  	if(strlen($numero < 1 OR $numero > 10 )){
	echo __('Please enter the Number! 1 to 10 alphanumeric characters.', 'boleto-pag-seguro-direto').'</a>';
	}
	; ?>
	
  <p><?php echo _e('Number', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="numero" type="text" id="numero" maxlength="5" value="<?php echo $numero; ?>" required>
  </p>
  
  
    <p><?php echo _e('Complement', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="complemento" type="text" id="complemento" maxlength="20" value="" >
  </p>
    <?php 
  	if(strlen($bairro < 5 OR $bairro > 60 )){
	echo __('Please enter the neighborhood! 5 to 60 alphanumeric characters.', 'boleto-pag-seguro-direto').'</a>';
	}
	; ?>  
  
      <p><?php echo _e('Neighborhood', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="bairro" type="text" id="bairro" maxlength="60" value="<?php echo $bairro; ?>" required>
  </p>
  
        <p><?php echo _e('Zip Code', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="cep" type="text" id="cep" value="<?php echo $cep; ?>" maxlength="9" required <?php if($preencher_endereco_automatico=="yes"){ ?> "readonly=true"<?php }?> >
  </p>
  
  
          <p><?php echo _e('City', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="cidade" type="text" id="cidade" maxlength="60" value="<?php echo $cidade; ?>" <?php if($preencher_endereco_automatico=="yes"){ ?> "readonly=true"<?php }?> >
  </p>
  
  
            <p><?php echo _e('State', 'boleto-pag-seguro-direto'); ?></p>
   <p> 
    <input name="uf" type="text" id="uf" maxlength="2" value="<?php echo $uf; ?>" <?php if($preencher_endereco_automatico=="yes"){ ?> "readonly=true"<?php }?> >
  </p>
  
  