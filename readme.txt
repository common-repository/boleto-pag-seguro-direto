=== Boleto Pag Seguro Direto ===
Contributors: Clodoaldo Xavier Gomes
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TZUHM63VZKJTL
Tags: Boleto, PagSeguro, Pag Seguro, Recebimentos de Doações, Doação, Donate, Donation, Boleto Online, PayPal, Pay Pal
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 3.5
Tested up to: 5.6
Stable tag: 1.2
Author URI: http://wordpress.org/extend/profile/clodoaldoevangelista
Gera o boleto do Pag Seguro UOL Direto e sem digitação da senha
Generates the ticket of the Pag Safe UOL Direct and without typing the password
== Description ==
Seu site precisa de um formulário para os seus clientes enviarem pagamentos ou doações? Este plugin resolve.
Does your site need a form for your customers to send payments or donations? This plugin resolves.
This Plugin is a Wordpress version of the API of tickets https://sounoob.com.br/pagseguro-sistemas-boleto/ UOL Secure Pag API (downloaded from https://github.com/sounoob/pagseguro-php-sdk /blob/master/example/boleto.php). The tickets are generated without the need of entering a password and without the need for the customer to be registered in the UOL Secure Pag.
= Features =
* Gera facilmente boletos do Pag Seguro UOL em seu site.
* Easily generate UOL Secure Pag tickets on your site.
* O cliente digita apenas o Valor, Nome, Cpf, Telefone e Cep.
* The customer only enters the Value, Name, Zip Code, Phone and Zip Code. 
* Capturar o código de barras do boleto pelo código.
* Capture the boleto barcode by code.
* Gera também boletos do tipo carnê sequencial (Boletos em lote).
* It also generates sequential carnage type tickets (lot tickets).
== Installation and use ==
1. Upload the plugin files to the `/wp-content/plugins/boleto-pag-seguro-direto` directory
Envie os arquivos do plugin para o diretório `/wp-content/plugins/boleto-pag-seguro-direto`
2. Activate the plugin through the 'Plugins' menu in WordPress
Ative o plugin através do menu 'Plugins' no WordPress
3. Configure the plugin (accessible via the admin menu)
Configure o plugin (acessível através do menu admin)
4. Include your email accounts and Token in the submenu: Plugins
Inclua suas contas de email e token no submenu: Plugins
5. A new page has been added. Find it in the "Pages" list and, if you wish, leave it available to your customers. If you need to display the form on other pages use this shortcode. [form-dados-do-boleto].
Uma nova página foi adicionada. Encontre-o na lista "Páginas" e, se desejar, deixe-o disponível para seus clientes. Se você precisar exibir o formulário em outras páginas, use este shortcode. [form-dados-do-boleto].
== Frequently Asked Questions ==
= Is Boleto Pag Seguro Direto free? =
Yes, you will not pay for the plug-in. Send me a donation if this plugin brings your client closer to you.
= O Boleto Pag Seguro Direto é grátis? =
Sim, você não pagará pelo plug-in. Envie-me uma doação se este plug-in trouxer seu cliente para mais perto de você.
== Screenshots ==
1. Log in with your Pag Seguro UOL email and your production token.
2. Make the data entry page available anywhere on the site using the shortcode or find the Ticket Data page created in the installation.
3. Generate the tickets easily without obliging your client to log into the Pag Seguro UOL.

== Changelog ==
= 1.2 =
* Date: 2020/10/10
Revision

= 1.1 =
* Date: 2020/02/27
Included in configurations is the option of not searching for the address by zip code. This option is useful because the post office does not always respond quickly.

= 1.0 =
* Date: 2019/12/06
Revision

= 0.9 =
* Date: 2019/11/17
Revision

= 0.8 =
* Date: 2019/03/27
Revision

= 0.7 =
* Date: 2019/02/15
Correction in automatic addressing by zip

= 0.6 =
* Date: 2019/02/05
Inclusion of fields for full client address. Validation of form fiel

= 0.5 =
* Date: 2018/12/16
Inclusion of fields for full client address. Validation of form fields.

= 0.4 =
* Date: 2018/12/07
Bug fix on value OK

= 0.3 =
* Date: 2018/09/12
Bug fix on cpf OK

= 0.2 =
* Date: 2018/08/21

= 0.1 =
* Updated links.