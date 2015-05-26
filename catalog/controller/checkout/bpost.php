<?php
class ControllerCheckoutBpost extends Controller {
	public function load_shipping_manager() {
        $get  = $_GET;
        $data = array(
            'bpost_account_id' => $this->config->get('bpost_account_id'),
            'bpost_passphrase' => $this->config->get('bpost_passphrase'),
            'return_url'       => HTTP_SERVER . 'index.php?route=checkout/bpost/close_shipping_manager'
        );
        
        $this->response->setOutput($this->load->view('default/template/checkout/bpost/load_shipping_manager.tpl', array_merge($data, $get)));
	}
    
    public function close_shipping_manager() {
        $request = $_REQUEST;
        $data    = array(
            'total_price'  => !empty($request['orderTotalPrice']) ? intval($request['orderTotalPrice']) : 0,
            'shipping_fee' => !empty($request['deliveryMethodPriceTotal']) ? intval($request['deliveryMethodPriceTotal']) : 0,
            'order_id'     => !empty($request['orderReference']) ? $request['orderReference'] : 0
        );
        
        $this->response->setOutput($this->load->view('default/template/checkout/bpost/close_shipping_manager.tpl', $data));
    }
    
    public function update_ss() {
        $this->session->data['custom_bpost']                        = 1;
            $this->session->data['shipping_method']['cost']         = $_POST['shipping_fee'] / 100;
            $this->session->data['bpost_reference']                 = $_POST['reference'];
            $this->session->data['shipping_method']['tax_class_id'] = '';
            $this->session->data['shipping_method']['title']        = 'BPost';
    }
}