<?php
include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'BoletoPagSeguroDireto_ShortCodeLoader.php');
 
class BoletoPagSeguroDiretoPagamentoBoleto extends BoletoPagSeguroDireto_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
		$content = "";	
		include( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/pages/PagamentoBoleto.php' );
		return $content;
    }
}
?>