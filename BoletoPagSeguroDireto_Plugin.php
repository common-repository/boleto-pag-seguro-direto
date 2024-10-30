<?php
include_once('BoletoPagSeguroDireto_LifeCycle.php');
class BoletoPagSeguroDireto_Plugin extends BoletoPagSeguroDireto_LifeCycle {
    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Your email acount Pag Seguro', 'boleto-pag-seguro-direto')),
			'BTextInput' => array(__('Your Token Pag Seguro', 'boleto-pag-seguro-direto')),
			'CTextInput' => array(__('Name company / Your Name', 'boleto-pag-seguro-direto')),
			'DTextInput' => array(__('Environment', 'boleto-pag-seguro-direto'), 'production', 'sandbox'),
			'GTextInput' => array(__('fill in address automatically? Disable if the post office fails ...', 'boleto-pag-seguro-direto'), 'yes', 'no'),

			'ETextInput' => array(__('Costs for the customer? If yes, the client will pay R$ 1.00', 'boleto-pag-seguro-direto'), 'yes', 'no'),
			'FTextInput' => array(__('I want to receive news in my email', 'boleto-pag-seguro-direto'), 'Yes', 'No')
					
        );
    }
//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }
    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }
    public function getPluginDisplayName() {
        return 'Boleto Pag Seguro Direto';
    }
    protected function getMainPluginFileName() {
        return 'boleto-pag-seguro-direto.php';
    }
    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
 

    protected function installDatabaseTablesAnPagesBoletoPagSeguroDireto() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
		
	include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/create/form-dados-do-boleto.php');
	include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/create/form-dados-do-boleto-confirma.php');	
	include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/create/PagamentoBoleto.php');
	include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/create/newsletters.php');
	
	
	
    }
    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTablesAnPagesBoletoPagSeguroDireto() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }

    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
public function upgrade() {
	
	$upgradeOk = true;
    $savedVersion = $this->getVersionSaved();
    if ($this->isVersionLessThan($savedVersion, '2.0')) {
        if ($this->isVersionLessThan($savedVersion, '1.8')) {
            if ($this->isVersionLessThan($savedVersion, '1.5')) {
                // perform version 1.5 upgrade action
				
				function boleto_pag_seguro_direto_atualiza_fun() {
								
		
				}
				
				
	
            }
            // perform version 1.8 upgrade action
        }
        // perform version 2.0 upgrade action
     }
 
  add_action( 'init', 'boleto_pag_seguro_direto_atualiza_fun' );
 
 
 
     // Post-upgrade, set the current version in the options
    $codeVersion = $this->getVersion();
    if ($upgradeOk && $savedVersion != $codeVersion) {
        $this->saveInstalledVersion();
    }
		
	
    }
    public function addActionsAndFilters() {
        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));
        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }

        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37

        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));

        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39
	
		include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/shortcodes/PagamentoBoleto.php');
		$sc = new BoletoPagSeguroDiretoPagamentoBoleto();
		$sc->register('pagamento-boleto');
	
	
		include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/shortcodes/form-dados-do-boleto.php');
		$sc = new BoletoPagSeguroDiretoFormDadosDoBoleto();
		$sc->register('form-dados-do-boleto');
		
		
		include_once( BOLETO_PAG_SEGURO_DIRETO_DIR .'boleto/shortcodes/form-dados-do-boleto-confirma.php');
		$sc = new BoletoPagSeguroDiretoFormDadosDoBoletoConfirma();
		$sc->register('form-dados-do-boleto-confirma');
        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41
    }

}