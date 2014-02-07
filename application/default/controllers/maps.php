<?php

class maps extends app_crud_controller{

	
	function tes_poligon(){
		$this->load->library('googlemaps');

		$config['center'] = '-8.450639,115.065308';
		$config['zoom'] = '10';
		$config['map_type'] = 'ROADMAP';
		$config['onclick'] = 'coba(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-8.245808928409964,114.90909576416016';
		$marker['infowindow_content'] = '1 - Hello World!';
		$marker['animation'] = 'DROP';
		$this->googlemaps->add_marker($marker);

		//The Island
		$data = $this->db->query('SELECT * FROM the_islands')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}
		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#A60CF2';
		$this->googlemaps->add_polygon($polygon);

		//The Island_1
		$data = $this->db->query('SELECT * FROM the_islands_1')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}
		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#A60CF2';
		$this->googlemaps->add_polygon($polygon);

		//The Island_2
		$data = $this->db->query('SELECT * FROM the_islands_2')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}
		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#A60CF2';
		$this->googlemaps->add_polygon($polygon);

		//South Bali
		$data = $this->db->query('SELECT * FROM south_bali')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}

		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#FF8C00';
		$this->googlemaps->add_polygon($polygon);

		//north Bali
		$data = $this->db->query('SELECT * FROM north_bali')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}

		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#EDED42';
		$this->googlemaps->add_polygon($polygon);

		//southwest coast
		$data = $this->db->query('SELECT * FROM southwest_coast')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}

		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#E84ADB';
		$this->googlemaps->add_polygon($polygon);

		//central Bali
		$data = $this->db->query('SELECT * FROM central_bali')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}

		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#4EED61';
		$this->googlemaps->add_polygon($polygon);

		// east coast
		$data = $this->db->query('SELECT * FROM east_coast')->result_array();
		$polygon = array();
		$polygon['points'] = array();
		foreach ($data as $key => $value) {
			$position = $value['lat'].','.$value['lang'];
			$polygon['points'][$key] = $position;
		}

		$polygon['strokeColor'] = '#FFFFFF';
		$polygon['fillColor'] = '#77BFE6';
		$this->googlemaps->add_polygon($polygon);

		$result = $this->googlemaps->create_map();
		$this->_data['map'] = $result;
	}

	function get_location(){
		$data = array(
			'id' => '',
			'lat' => $_POST['lat'],
			'lang' => $_POST['lang']
		);
		$this->db->insert('east_coast', $data);
		redirect('maps/tes_poligon');
	}

}