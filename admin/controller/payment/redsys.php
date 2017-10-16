<?php 
class ControllerPaymentRedsys extends Controller {
	private $error = array(); 
 
	public function index() {
		$this->load->language('payment/redsys');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate() ) {
			$this->model_setting_setting->editSetting('redsys', $this->request->post);				

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
	
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['text_real'] = $this->language->get('text_real');
		$data['text_sisd'] = $this->language->get('text_sisd');
		$data['text_sisi'] = $this->language->get('text_sisi');	
		$data['text_sist'] = $this->language->get('text_sist');	

		$data['text_payment'] = $this->language->get('text_payment');
		$data['text_defered'] = $this->language->get('text_defered');
		$data['text_authenticate'] = $this->language->get('text_authenticate');

		$data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$data['entry_entorno'] = $this->language->get('entry_entorno');
		$data['entry_nombre'] = $this->language->get('entry_nombre');
		$data['entry_fuc'] = $this->language->get('entry_fuc');
		$data['entry_tipopago'] = $this->language->get('entry_tipopago');
		$data['entry_clave'] = $this->language->get('entry_clave');
		$data['entry_term'] = $this->language->get('entry_term');
		$data['entry_firma'] = $this->language->get('entry_firma');
		$data['entry_moneda'] = $this->language->get('entry_moneda');	
		$data['entry_trans'] = $this->language->get('entry_trans');		
		$data['entry_recargo'] = $this->language->get('entry_recargo');
		
		$data['entry_notif'] = $this->language->get('entry_notif');
		$data['entry_ssl'] = $this->language->get('entry_ssl');
		$data['entry_error'] = $this->language->get('entry_error');
		$data['entry_idiomas'] = $this->language->get('entry_idiomas');

		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$data['entry_total'] = $this->language->get('entry_total');	
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		// RECOGIDA DE ERRORES
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['nombre'])) {
			$data['error_nombre'] = $this->error['nombre'];
		} else {
			$data['error_nombre'] = '';
		}
		
		if (isset($this->error['fuc'])) {
			$data['error_fuc'] = $this->error['fuc'];
		} else {
			$data['error_fuc'] = '';
		}
		
		if (isset($this->error['clave'])) {
			$data['error_clave'] = $this->error['clave'];
		} else {
			$data['error_clave'] = '';
		}
		
		if (isset($this->error['term'])) {
			$data['error_term'] = $this->error['term'];
		} else {
			$data['error_term'] = '';
		}
		
		if (isset($this->error['trans'])) {
			$data['error_trans'] = $this->error['trans'];
		} else {
			$data['error_trans'] = '';
		}
		
		if (isset($this->error['recargo'])) {
			$data['error_recargo'] = $this->error['recargo'];
		} else {
			$data['error_recargo'] = '';
		}

		// FIN DE ERRORES
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')      		
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/redsys', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('payment/redsys', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		
		
		//RECOGIDA DE PARAM.
		
		if (isset($this->request->post['redsys_entorno'])) {
			$data['redsys_entorno'] = $this->request->post['redsys_entorno'];
		} else {
			$data['redsys_entorno'] = $this->config->get('redsys_entorno');
		}

		if (isset($this->request->post['redsys_nombre'])) {
			$data['redsys_nombre'] = $this->request->post['redsys_nombre'];
		} else {
			$data['redsys_nombre'] = $this->config->get('redsys_nombre');
		}

		if (isset($this->request->post['redsys_fuc'])) {
			$data['redsys_fuc'] = $this->request->post['redsys_fuc'];
		} else {
			$data['redsys_fuc'] = $this->config->get('redsys_fuc');
		}
		
		if (isset($this->error['tipopago'])) {
			$data['error_tipopago'] = $this->error['tipopago'];
		} else {
			$data['error_tipopago'] = '';
		}

		if (isset($this->request->post['redsys_clave'])) {
			$data['redsys_clave'] = $this->request->post['redsys_clave'];
		} else {
			$data['redsys_clave'] = $this->config->get('redsys_clave');
		}
		
		if (isset($this->request->post['redsys_term'])) {
			$data['redsys_term'] = $this->request->post['redsys_term'];
		} else {
			$data['redsys_term'] = $this->config->get('redsys_term');
		}

		if (isset($this->request->post['redsys_firma'])) {
			$data['redsys_firma'] = $this->request->post['redsys_firma'];
		} else {
			$data['redsys_firma'] = $this->config->get('redsys_firma');
		}
		
		if (isset($this->request->post['redsys_moneda'])) {
			$data['redsys_moneda'] = $this->request->post['redsys_moneda'];
		} else {
			$data['redsys_moneda'] = $this->config->get('redsys_moneda');
		}
		
		if (isset($this->request->post['redsys_trans'])) {
			$data['redsys_trans'] = $this->request->post['redsys_trans'];
		} else {
			$data['redsys_trans'] = $this->config->get('redsys_trans');
		}
	
		if (isset($this->request->post['redsys_recargo'])) {
			$data['redsys_recargo'] = $this->request->post['redsys_recargo'];
		} else {
			$data['redsys_recargo'] = $this->config->get('redsys_recargo');
		}
		
		
		if (isset($this->request->post['redsys_notif'])) {
			$data['redsys_notif'] = $this->request->post['redsys_notif'];
		} else {
			$data['redsys_notif'] = $this->config->get('redsys_notif');
		}
		
		if (isset($this->request->post['redsys_ssl'])) {
			$data['redsys_ssl'] = $this->request->post['redsys_ssl'];
		} else {
			$data['redsys_ssl'] = $this->config->get('redsys_ssl');
		}
		
		if (isset($this->request->post['redsys_error'])) {
			$data['redsys_error'] = $this->request->post['redsys_error'];
		} else {
			$data['redsys_error'] = $this->config->get('redsys_error');
		}
		
		if (isset($this->request->post['redsys_idiomas'])) {
			$data['redsys_idiomas'] = $this->request->post['redsys_idiomas'];
		} else {
			$data['redsys_idiomas'] = $this->config->get('redsys_idiomas');
		}
		
		if (isset($this->request->post['redsys_status'])) {
			$data['redsys_status'] = $this->request->post['redsys_status'];
		} else {
			$data['redsys_status'] = $this->config->get('redsys_status');
		}

		if (isset($this->request->post['redsys_order_status_id'])) {
			$data['redsys_order_status_id'] = $this->request->post['redsys_order_status_id'];
		} else {
			$data['redsys_order_status_id'] = $this->config->get('redsys_order_status_id'); 
		} 

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		
		if (isset($this->request->post['redsys_sort_order'])) {
			$data['redsys_sort_order'] = $this->request->post['redsys_sort_order'];
		} else {
			$data['redsys_sort_order'] = $this->config->get('redsys_sort_order');
		}
		
			if (isset($this->request->post['redsys_total'])) {
			$data['redsys_total'] = $this->request->post['redsys_total'];
		} else {
			$data['redsys_total'] = $this->config->get('redsys_total'); 
		} 

		if (isset($this->request->post['redsys_geo_zone_id'])) {
			$data['redsys_geo_zone_id'] = $this->request->post['redsys_geo_zone_id'];
		} else {
			$data['redsys_geo_zone_id'] = $this->config->get('redsys_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		
		//FIN DE RECOGIDA DE PARAMS.

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/redsys.tpl', $data));

 
	}
	private function validate() {
		
		if (!$this->user->hasPermission('modify', 'payment/redsys')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['redsys_nombre']) {
			$this->error['nombre'] = $this->language->get('error_nombre');
		}

		if (!$this->request->post['redsys_fuc']) {
			$this->error['fuc'] = $this->language->get('error_fuc');
		}
		/*
		if (!$this->request->post['redsys_tipopago']) {
			$this->error['tipopago'] = $this->language->get('error_tipopago');
		}
		*/
		if (!$this->request->post['redsys_clave']) {
			$this->error['clave'] = $this->language->get('error_clave');
		}

		if (!$this->request->post['redsys_term']) {
			$this->error['terminal'] = $this->language->get('error_terminal');
		}
		
		if ($this->request->post['redsys_trans']!="0") {
			$this->error['trans'] = $this->language->get('error_trans');
		}

		if (!$this->request->post['redsys_recargo']) {
			$this->error['recargo'] = $this->language->get('error_recargo');
		}
		
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	
	
	
	}
}
?>