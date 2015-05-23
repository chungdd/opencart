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
        $data['account_id'] = $this->language->get('account_id');
        $data['passphrase'] = $this->language->get('passphrase');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['entry_status'] = $this->language->get('entry_status');
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
        
        if (isset($this->request->post['bpost_account_id'])) {
			$data['bpost_account_id'] = $this->request->post['bpost_account_id'];
		} else {
			$data['bpost_account_id'] = $this->config->get('bpost_account_id');
		}
        
        if (isset($this->request->post['bpost_passphrase'])) {
			$data['bpost_passphrase'] = $this->request->post['bpost_passphrase'];
		} else {
			$data['bpost_passphrase'] = $this->config->get('bpost_passphrase');
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