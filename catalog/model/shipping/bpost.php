<?php
class ModelShippingBpost extends Model {
	function getQuote($address) {
		$this->load->language('shipping/bpost');

        $method_data = array(
			'code'       => 'bpost',
			'title'      => 'BPost',
			'quote'      => array(
                'bpost' => array(
                    'code'         => 'bpost.bpost',
                    'title'        => 'BPost',
                    'text'         => '',
                    'cost'         => '',
                    'tax_class_id' => 0,
                    'tax_id_class' => 0,
                )
            ),
			'sort_order' => $this->config->get('bpost_sort_order'),
			'error'      => ''
		);

		return $method_data;
	}
}