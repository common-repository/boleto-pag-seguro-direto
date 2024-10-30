<?php
/*
   Plugin Name: Boleto Pag Seguro Direto
   Plugin URI: http://wordpress.org/extend/plugins/boleto-pag-seguro-direto/
   Version: 1.2
   Author: Clodoaldo Xavier Gomes
   Description: Gera o boleto do Pag Seguro sem digitação da senha. Carnê de boletos sequenciais. A CADA ATUALIZAÇÃO veja a instruções na página de <a href="plugins.php?page=BoletoPagSeguroDireto_PluginSettings"> CONFIGURAÇÕES </a>. <a href="https://entregador.click/wordpress-works/form-dados-do-boleto/" target="_blank">. Gere um boleto de doação, efetue o pagamento para receber suporte.</a> <a href="https://entregador.click/wordpress-works/" target="_blank">. Conheça a versão Pro.</a>
   License: GPLv3
   Author URI: https://profiles.wordpress.org/clodoaldoevangelista
   Text Domain: boleto-pag-seguro-direto
   Domain Path: /languages
   License: GPLv3
  */
/*

    "WordPress Plugin Template" Copyright (C) 2018 Michael Simpson  (email : michael.d.simpson@gmail.com)
    This following part of this file is part of WordPress Plugin Template for WordPress.
    WordPress Plugin Template is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    WordPress Plugin Template is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with Contact Form to Database Extension.
    If not, see http://www.gnu.org/licenses/gpl-3.0.html

*/

$BoletoPagSeguroDireto_minimalRequiredPhpVersion = '5.0';

define('BOLETO_PAG_SEGURO_DIRETO', plugin_dir_url( __FILE__ ));

define('BOLETO_PAG_SEGURO_DIRETO_URL', plugins_url('',__FILE__));

define('BOLETO_PAG_SEGURO_DIRETO_DIR', plugin_dir_path(__FILE__));

define('BOLETO_PAG_SEGURO_DIRETO_LANGUAGE_DIR', 'boleto-pag-seguro-direto/languages');

define('BOLETO_PAG_SEGURO_DIRETO_SITE', site_url());

if ( ! defined( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_VERSION' ) ) define( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_VERSION', '1.2.3' );

if ( ! defined( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_DIR_PATH' ) ) define( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_DIR_PATH', plugins_url( '', __FILE__ ) );

if ( ! defined( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_BASENAME' ) ) define( 'BOLETO_PAG_SEGURO_DIRETO_PLUGIN_BASENAME', plugin_basename( __FILE__) );



/**

 * Check the PHP version and give a useful error message if the user's version is less than the required version

 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying

 * an error message on the Admin page

 */

function BoletoPagSeguroDireto_noticePhpVersionWrong() {

    global $BoletoPagSeguroDireto_minimalRequiredPhpVersion;

    echo '<div class="updated fade">' .

      __('Error: plugin "Boleto Pag Seguro Direto" requires a newer version of PHP to be running.',  'boleto-pag-seguro-direto').

            '<br/>' . __('Minimal version of PHP required: ', 'boleto-pag-seguro-direto') . '<strong>' . $BoletoPagSeguroDireto_minimalRequiredPhpVersion . '</strong>' .

            '<br/>' . __('Your server\'s PHP version: ', 'boleto-pag-seguro-direto') . '<strong>' . phpversion() . '</strong>' .

         '</div>';

}





function BoletoPagSeguroDireto_PhpVersionCheck() {

    global $BoletoPagSeguroDireto_minimalRequiredPhpVersion;

    if (version_compare(phpversion(), $BoletoPagSeguroDireto_minimalRequiredPhpVersion) < 0) {

        add_action('admin_notices', 'BoletoPagSeguroDireto_noticePhpVersionWrong');

        return false;

    }

    return true;

}





/**

 * Initialize internationalization (i18n) for this plugin.

 * References:

 *      http://codex.wordpress.org/I18n_for_WordPress_Developers

 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631

 * @return void

 */







function BoletoPagSeguroDireto_i18n_init() {

    $pluginDir = dirname(plugin_basename(__FILE__));

    load_plugin_textdomain('boleto-pag-seguro-direto', false, $pluginDir . '/languages/');

}









//////////////////////////////////

// Run initialization

/////////////////////////////////



// Initialize i18n

add_action('plugins_loaded','BoletoPagSeguroDireto_i18n_init');



// Run the version check.

// If it is successful, continue with initialization for this plugin

if (BoletoPagSeguroDireto_PhpVersionCheck()) {

    // Only load and run the init function if we know PHP version can parse it

    include_once('boleto-pag-seguro-direto_init.php');

    BoletoPagSeguroDireto_init(__FILE__);

}