<?php

/**
 * app_crud_controller.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2011 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

if (!class_exists('app_crud_controller')) {

	class app_crud_controller extends crud_controller {

		function _save($id = null) {
			// xlog($this->_name);exit;
			$this->_view = $this->_name . '/show';

			$this->load->library('googlemaps');

			$config['center'] = '-8.450639,115.065308';
			$config['zoom'] = '10';
			$config['map_type'] = 'ROADMAP';
			$config['onclick'] = 'addMarker(event.latLng.lat(), event.latLng.lng());';
			$this->googlemaps->initialize($config);
			$this->_data['map'] = $this->googlemaps->create_map();

			$categorys = $this->db->query('SELECT * FROM culture_category ORDER BY name ASC')->result_array();
			$this->_data['category_options'] = array('' => '(please select)');
			foreach ($categorys as $category) {
				$this->_data['category_options'][$category['id']] = $category['name'];
			}

			$main_categorys = $this->db->query('SELECT * FROM main_category WHERE parent_id = ?',array('16'))->result_array();
			$this->_data['main_category_options'] = array('' => '(please select)');
			foreach ($main_categorys as $main_category) {
				$this->_data['main_category_options'][$main_category['id']] = $main_category['name'];
			}

			$sub_categorys = $this->db->query('SELECT * FROM explore_category')->result_array();
			$this->_data['explorer_options'] = array('' => '(please select)');
			foreach ($sub_categorys as $sub_category) {
				$this->_data['explorer_options'][$sub_category['id']] = $sub_category['sub_category'];
			}

			$areas = $this->db->query('SELECT * FROM area_category ORDER BY name ASC')->result_array();
			$this->_data['area_options'] = array('' => '(please select)');
			foreach ($areas as $area) {
				$this->_data['area_options'][$area['id']] = $area['name'];
			}

			$activities = $this->db->query('SELECT * FROM activities_category ORDER BY name ASC')->result_array();
			$this->_data['activities_options'] = array('' => '(please select)');
			foreach ($activities as $area) {
				$this->_data['activities_options'][$area['id']] = $area['name'];
			}

			$result = array();
			$legend = $this->db->query('SELECT DISTINCT(legend_category) FROM explore')->result_array();

			foreach ($legend as $r) {
				$result[] = $r['legend_category'];
			}
			$this->_data['category'] =  json_encode($result);

			if ($_POST) {
				if($_POST['legend_category'] == 'Hotel' || $_POST['legend_category'] == 'hotel' || $_POST['legend_category'] == 'Restaurant' || $_POST['legend_category'] == 'restaurant' || $_POST['legend_category'] == 'Shop' || $_POST['legend_category'] == 'shop' || $_POST['legend_category'] == 'Golf' || $_POST['legend_category'] == 'golf' || $_POST['legend_category'] == 'Other' || $_POST['legend_category'] == 'other'){
					$_POST['permanent_legend'] = '1';
				} else {
					$_POST['permanent_legend'] = '0';
				}

				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['data_dir'] = $this->_name.'/image';
				$config['upload_path'] = $this->_name.'/image';
				$config['encrypt_name'] = true;
				$config['field'] = 'image';

				if(!empty($_FILES['image']['name'])){
					$this->load->library('ximage',$config);
					$this->ximage->initialize($config);
				}

				if(!empty($_FILES['image']['name'][0])){
					$this->load->library('ximage',$config);
					$this->ximage->initialize($config);
				}

				if ($this->_validate()) {
					$uri = 'data/' .$config['upload_path'].'/original/';
					$_POST['id'] = $id;
					try {
						$id = $this->_model()->save($_POST, $id);

						if($_FILES['image']['name']){
							$file = $this->ximage->_data;
							$this->_insert_file($id,$file,$uri);
						}

						$this->session->unset_userdata('referrer');
						$referrer = $this->session->userdata('referrer');

						if (empty($referrer)) {
							$referrer = $this->_get_uri('listing');
						}

						add_info( ($id) ? l('Record updated') : l('Record added') );

						if (!$this->input->is_ajax_request()) {
							redirect($referrer);
						}
					} catch (Exception $e) {
						add_error(l($e->getMessage()));
					}
				}
			} else {
				if ($id !== null) {
					if($this->_name == 'culture_category' || $this->_name == 'area_category'){
						$this->_data['image'] = $this->db->query('SELECT * FROM '.$this->_name.' WHERE file_name IS NOT NULL')->row_array();
					} else if($this->_name == 'explore' || $this->_name == 'explore_category' || $this->_name == 'activities_category' || $this->_name == 'contact'){

					} else {
						$this->_data['images'] = $this->db->query('SELECT * FROM '.$this->_name.'_image WHERE '.$this->_name.'_id = ?',array($id))->result_array();
					}

					$this->_data['id'] = $id;
					$_POST = $this->_model()->get($id);
					if (empty($_POST)) {
						show_404($this->uri->uri_string);
					}
				}
				$this->load->library('user_agent');
				$this->session->set_userdata('referrer', $this->agent->referrer());
			}
			$this->_data['fields'] = $this->_model()->list_fields(true);
		}

		function _insert_file($id,$files,$uri){
			foreach ($files as $key => $value) {
				$data = array(
					$this->_name.'_id' => $id,
					'orig_name' => $value['orig_name'],
					'file_name' => $value['file_name'],
					'uri' => $uri.$value['file_name']
					);
				$this->_model()->_insert_file($data);
			}
		}

		function delete_image ($id, $id_image){
			$image = "SELECT * FROM ".$this->_name."_image WHERE id = ?";
			$res = $this->db->query($image, array($id_image))->row_array();

			unlink('data/'.$this->_name.'/image/original/' . $res['file_name']);
			unlink('data/'.$this->_name.'/image/thumb/' . $res['file_name']);

			$sql = "DELETE FROM ".$this->_name."_image WHERE id=?";
			$this->db->query($sql, array($id_image));
			redirect(site_url($this->_name.'/edit' .'/'. $id ));
		}
	}
}
