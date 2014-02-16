<?php 

class Model_xls extends CI_Model{

	function get_all(){
		$result = $this->db->get('datos_test');
		return $result->result();
	}
}