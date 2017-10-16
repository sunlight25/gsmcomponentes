<?php
/* 
 *
 * Javier García Ortiz
 * Fecha: Octubre 2014
 * @author virtualcom@redsys.es
 */
class ControllerPaymentRedsys extends Controller {
	public function index() {
		
		$this->load->language('payment/redsys'); 
		$data['button_confirm'] = $this->language->get('button_confirm');

		if ($this->config->get('redsys_entorno') == 'Real') {
			$data['action'] = 'https://sis.redsys.es/sis/realizarPago';
		} else if ($this->config->get('redsys_entorno') == 'Sis-d') {
			$data['action'] = 'http://sis-d.redsys.es/sis/realizarPago';		
		} else if ($this->config->get('redsys_entorno') == 'Sis-i') {
			$data['action'] = 'https://sis-i.redsys.es:25443/sis/realizarPago';
		} else if ($this->config->get('redsys_entorno') == 'Sis-t') {
			$data['action'] = 'https://sis-t.redsys.es:25443/sis/realizarPago';
		}	
  
		$this->load->model('checkout/order');
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
		///////////////////////////////////////////////////////////////////////////////////
		//Obtengo los datos de configuración
		$data['Nombre']=$this->config->get('redsys_nombre');
		$data['Fuc']=$this->config->get('redsys_fuc');
		$data['Tipopago']=$this->config->get('redsys_tipopago');
		$data['Clave']=$this->config->get('redsys_clave');
		$data['Terminal']=$this->config->get('redsys_term');
		$data['Firma']=$this->config->get('redsys_firma');
		$data['Moneda']=$this->config->get('redsys_moneda');
		$data['Trans']=$this->config->get('redsys_trans');
		$data['Recargo']=$this->config->get('redsys_recargo');
		$data['Notif']=$this->config->get('redsys_notif');
		$data['Ssl']=$this->config->get('redsys_ssl');
		$data['Error']=$this->config->get('redsys_error');
		$data['Idiomas']=$this->config->get('redsys_idiomas');	
			if($data['Idiomas']=="No"){
			$data['Idiomas']="0";
			}
			else {
				$idioma_web = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
				switch ($idioma_web) {
					case 'es':
					$idiomaFinal='001';
					break;
					case 'en':
					$idiomaFinal='002';
					break;
					case 'ca':
					$idiomaFinal='003';
					break;
					case 'fr':
					$idiomaFinal='004';
					break;
					case 'de':
					$idiomaFinal='005';
					break;
					case 'nl':
					$idiomaFinal='006';
					break;
					case 'it':
					$idiomaFinal='007';
					break;
					case 'sv':
					$idiomaFinal='008';
					break;
					case 'pt':
					$idiomaFinal='009';
					break;
					case 'pl':
					$idiomaFinal='011';
					break;
					case 'gl':
					$idiomaFinal='012';
					break;
					case 'eu':
					$idiomaFinal='013';
					break;
					default:
					$idiomaFinal='002';
				}		
			$data['Idiomas']=$idiomaFinal;
			}
			//Callback
			if($data['Ssl']=="No"){
			$data['Notify_url'] = $this->url->link('payment/redsys/callback', '', 'SSL');
			}
			else {$data['Notify_url'] = $this->url->link('payment/redsys/callback', '', 'SSL');
			}
		
		///////////////////////////////////////////////////////////////////////////////////	
		//Obtengo los datos del cliente
		$data['CustomerName'] = html_entity_decode($order_info['payment_firstname'] . ' ' . $order_info['payment_lastname'], ENT_QUOTES, 'UTF-8');
		$data['CustomerEMail'] = $order_info['email'];
		$data['BillingFirstnames'] = $order_info['payment_firstname'];
		$data['BillingSurname'] = $order_info['payment_lastname'];
		$data['BillingAddress1'] = $order_info['payment_address_1'];
		$data['BillingAddress2'] = $order_info['payment_address_2'];
		$data['BillingCity'] = $order_info['payment_city'];
		$data['BillingPostCode'] = $order_info['payment_postcode'];
		$data['BillingCountry'] = $order_info['payment_iso_code_2'];
		$data['BillingPhone'] = $order_info['telephone'];

		if ($this->cart->hasShipping()) {
			$data['DeliveryFirstnames'] = $order_info['shipping_firstname'];
			$data['DeliverySurname'] = $order_info['shipping_lastname'];
			$data['DeliveryAddress1'] = $order_info['shipping_address_1'];
			$data['DeliveryAddress2'] = $order_info['shipping_address_2'];
			$data['DeliveryCity'] = $order_info['shipping_city'];
			$data['DeliveryPostCode'] = $order_info['shipping_postcode'];
			$data['DeliveryCountry'] = $order_info['shipping_iso_code_2'];
			$data['DeliveryState'] = $order_info['shipping_zone_code'];
			$data['DeliveryPhone'] = $order_info['telephone'];
		} 
		else {
			$data['DeliveryFirstnames'] = $order_info['payment_firstname'];
			$data['DeliverySurname'] = $order_info['payment_lastname'];
			$data['DeliveryAddress1'] = $order_info['payment_address_1'];
			$data['DeliveryAddress2'] = $order_info['payment_address_2'];
			$data['DeliveryCity'] = $order_info['payment_city'];
			$data['DeliveryPostCode'] = $order_info['payment_postcode'];
			$data['DeliveryCountry'] = $order_info['payment_iso_code_2'];
			$data['DeliveryState'] = $order_info['payment_zone_code'];
			$data['DeliveryPhone'] = $order_info['telephone'];			
		}
		//Resumen de un cliente
		$data['Titular'] = $data['DeliveryFirstnames']." ".$data['DeliverySurname']."/".$data['DeliveryAddress1']."/Telef:".$data['DeliveryPhone'];
		
		
		///////////////////////////////////////////////////////////////////////////////////
		//Obtengo los datos del pedido

		//Order_ID
		$data['Id']=str_pad($this->session->data['order_id'], 8, "0", STR_PAD_LEFT) . date('is');

		//Desc. del pedido
		$data['Productos']="";
		foreach ($this->cart->getProducts() as $product) {
			$data['Productos'].=$product['name']."-".$product['model']."-".$product['quantity']."/";
		}		

		//Calculo del recargo
		$porcientorecargo = $data['Recargo'];
		$porcientorecargo = str_replace (',','.',$porcientorecargo);
		$totalcompra = $this->currency->format($order_info['total'], $order_info['currency_code'], false, false);
		$fee = ($porcientorecargo / 100) * $totalcompra;
		
		//Precio del pedido
		$total = $this->currency->format($order_info['total'], $order_info['currency_code'], false, false);
		$transaction_amount = number_format( (float) $total + $fee, 2, '.', '' );
		$transaction_amount = str_replace('.','',$transaction_amount);
		$transaction_amount = floatval($transaction_amount);
		$data['Amount'] = $transaction_amount;
		
		
		///////////////////////////////////////////////////////////////////////////////////
		// Generamos la firma	
		$firm   = $data['Firma'];
		$codigo = $data['Fuc'];	
		$descripcion = $data['Titular'];
		$urltienda = $data['Notify_url'];
		$idPedido = $data['Id'];
		
		if($data['Moneda']=="EURO"){
			$moneda="978";
			}
		else{ $moneda="840";
			}
		$data['Moneda']=$moneda;	
		
		$clave  = $data['Clave'];
		$trans	= $data['Trans'];
		
		// Cálculo del SHA1 $trans . $urltienda
		if($firm=="Completa"){
			$mensaje = $transaction_amount . $idPedido . $codigo . $moneda . $clave;
			}
		else{
			$mensaje = $transaction_amount . $idPedido . $codigo . $moneda . $trans .$urltienda . $clave;
			}
		$data['Firmafinal'] = strtoupper(sha1($mensaje));

		/////////////FIN CALCULO DE FIRMA

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/redsys.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/redsys.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/redsys.tpl', $data);
		}		
	
	}

	
	
	public function callback() {
		
		//Estados de un pedido:
		//1 pending,2 processing,3 shipped,4 "",5 complete,6 "",7 canceled,8 denied,9 Canceled Reversal,10 Failed,11 Refunded,12 Reversed,13 Chargeback,14 Expired,15 Processed,16 Voided,17 "",
		$this->load->model('checkout/order');

			if (isset($this->request->get['Ds_Order'])) {
								
				// Recogemos la clave del comercio para autenticar
				$clave     = $this->config->get('redsys_clave');	
				// Recogemos datos de respuesta
				$total     = $_GET["Ds_Amount"];
				$pedido    = $_GET["Ds_Order"];
				$codigo    = $_GET["Ds_MerchantCode"];
				$moneda    = $_GET["Ds_Currency"];
				$respuesta = $_GET["Ds_Response"];
				$firma_remota = $_GET["Ds_Signature"];
				$fecha= $_GET["Ds_Date"];
				$hora= $_GET["Ds_Hour"];
									
				// Cálculo del SHA1
				$mensaje = $total . $pedido . $codigo . $moneda . $respuesta . $clave;
				$firma_local = strtoupper(sha1($mensaje));
					
						if ($firma_local == $firma_remota){
							// Formatear variables
							$respuesta = intval($respuesta);

							if ($respuesta < 101){
									//$this->model_checkout_order->addOrderHistory($idPedido, 5);
									$this->response->redirect($this->url->link('checkout/success'));
							}
							else {	
									//$this->model_checkout_order->addOrderHistory($idPedido, 7);
									$this->response->redirect($this->url->link('checkout/failure'));
							}
						}// if (firma_local=firma_remota)
						else {
									//$this->model_checkout_order->addOrderHistory($idPedido, 7);
									$this->response->redirect($this->url->link('checkout/failure'));
							}
			
			} 
			else if (isset($this->request->post['Ds_Order'])){
				
				//Recuperamos Id_pedido
				$idPedido=$this->request->post['Ds_Order'];
				$idPedido=substr($idPedido,0,8);
				$idPedido=ltrim($idPedido,"0");
				$order = $this->model_checkout_order->getOrder($idPedido);
				
				// Recogemos la clave del comercio para autenticar
				$clave     = $this->config->get('redsys_clave');	
				// Recogemos datos de respuesta
				$total     = $_POST["Ds_Amount"];
				$pedido    = $_POST["Ds_Order"];
				$codigo    = $_POST["Ds_MerchantCode"];
				$moneda    = $_POST["Ds_Currency"];
				$respuesta = $_POST["Ds_Response"];
				$firma_remota = $_POST["Ds_Signature"];
				$fecha= $_POST["Ds_Date"];
				$hora= $_POST["Ds_Hour"];
						
					
				// Cálculo del SHA1
				$mensaje = $total . $pedido . $codigo . $moneda . $respuesta . $clave;
				$firma_local = strtoupper(sha1($mensaje));
					
						if ($firma_local == $firma_remota){
							// Formatear variables
							$respuesta = intval($respuesta);
							
							if ($respuesta < 101){
									$this->model_checkout_order->addOrderHistory($idPedido, 5);
									//$this->response->redirect($this->url->link('checkout/success'));
							}
							else {
									$this->model_checkout_order->addOrderHistory($idPedido, 7);
									//$this->response->redirect($this->url->link('checkout/failure'));
							}
						}// if (firma_local=firma_remota)
						else {
									$this->model_checkout_order->addOrderHistory($idPedido, 7);
									//$this->response->redirect($this->url->link('checkout/failure'));
							}
			
			}
			else
			{
				echo ("No hay respuesta del TPV");
			}		
		
	}
}
?>