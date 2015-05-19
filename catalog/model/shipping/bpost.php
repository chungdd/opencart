<?php
class ModelShippingBpost extends Model {
	function getQuote($address) {
		$this->load->language('shipping/bpost');

        $method_data = array(
			'code'       => 'bpost',
			'title'      => 'BPost',
			'quote'      => array(),
			'sort_order' => $this->config->get('bpost_sort_order'),
			'error'      => ''
		);

		return $method_data;
	}
}