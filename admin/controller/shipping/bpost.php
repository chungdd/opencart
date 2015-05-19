<?php
class ControllerShippingBpost extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('shipping/bpost');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('bpost', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_next_day_air'] = $this->language->get('text_next_day_air');
		$data['text_2nd_day_air'] = $this->language->get('text_2nd_day_air');
		$data['text_ground'] = $this->language->get('text_ground');
		$data['text_worldwide_express'] = $this->language->get('text_worldwide_express');
		$data['text_worldwide_express_plus'] = $this->language->get('text_worldwide_express_plus');
		$data['text_worldwide_expedited'] = $this->language->get('text_worldwide_expedited');
		$data['text_express'] = $this->language->get('text_express');
		$data['text_standard'] = $this->language->get('text_standard');
		$data['text_3_day_select'] = $this->language->get('text_3_day_select');
		$data['text_next_day_air_saver'] = $this->language->get('text_next_day_air_saver');
		$data['text_next_day_air_early_am'] = $this->language->get('text_next_day_air_early_am');
		$data['text_expedited'] = $this->language->get('text_expedited');
		$data['text_2nd_day_air_am'] = $this->language->get('text_2nd_day_air_am');
		$data['text_saver'] = $this->language->get('text_saver');
		$data['text_express_early_am'] = $this->language->get('text_express_early_am');
		$data['text_express_plus'] = $this->language->get('text_express_plus');
		$data['text_today_standard'] = $this->language->get('text_today_standard');
		$data['text_today_dedicated_courier'] = $this->language->get('text_today_dedicated_courier');
		$data['text_today_intercity'] = $this->language->get('text_today_intercity');
		$data['text_today_express'] = $this->language->get('text_today_express');
		$data['text_today_express_saver'] = $this->language->get('text_today_express_saver');

		$data['entry_key'] = $this->language->get('entry_key');
		$data['entry_username'] = $this->language->get('entry_username');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_pickup'] = $this->language->get('entry_pickup');
		$data['entry_packaging'] = $this->language->get('entry_packaging');
		$data['entry_classification'] = $this->language->get('entry_classification');
		$data['entry_origin'] = $this->language->get('entry_origin');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_state'] = $this->language->get('entry_state');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_quote_type'] = $this->language->get('entry_quote_type');
		$data['entry_service'] = $this->language->get('entry_service');
		$data['entry_insurance'] = $this->language->get('entry_insurance');
		$data['entry_display_weight'] = $this->language->get('entry_display_weight');
		$data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$data['entry_length_code'] = $this->language->get('entry_length_code');
		$data['entry_length_class'] = $this->language->get('entry_length_class');
		$data['entry_dimension'] = $this->language->get('entry_dimension');
		$data['entry_length'] = $this->language->get('entry_length');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_debug'] = $this->language->get('entry_debug');

		$data['help_key'] = $this->language->get('help_key');
		$data['help_username'] = $this->language->get('help_username');
		$data['help_password'] = $this->language->get('help_password');
		$data['help_pickup'] = $this->language->get('help_pickup');
		$data['help_packaging'] = $this->language->get('help_packaging');
		$data['help_classification'] = $this->language->get('help_classification');
		$data['help_origin'] = $this->language->get('help_origin');
		$data['help_city'] = $this->language->get('help_city');
		$data['help_state'] = $this->language->get('help_state');
		$data['help_country'] = $this->language->get('help_country');
		$data['help_postcode'] = $this->language->get('help_postcode');
		$data['help_test'] = $this->language->get('help_test');
		$data['help_quote_type'] = $this->language->get('help_quote_type');
		$data['help_service'] = $this->language->get('help_service');
		$data['help_insurance'] = $this->language->get('help_insurance');
		$data['help_display_weight'] = $this->language->get('help_display_weight');
		$data['help_weight_class'] = $this->language->get('help_weight_class');
		$data['help_length_class'] = $this->language->get('help_length_class');
		$data['help_dimension'] = $this->language->get('help_dimension');
		$data['help_debug'] = $this->language->get('help_debug');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('shipping/bpost', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('shipping/bpost', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['bpost_status'])) {
			$data['bpost_status'] = $this->request->post['bpost_status'];
		} else {
			$data['bpost_status'] = $this->config->get('bpost_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('shipping/bpost.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'shipping/bpost')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}