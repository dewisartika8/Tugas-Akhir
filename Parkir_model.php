<?php
class Parkir_model extends CI_Model{
 
    function get_rows(){
        $hasil=$this->db->get('slot_parkir')->result();
        return $hasil;
    }

	function update($id,$data){
		$this->db->where('id',$id);
        $this->db->update('slot_parkir',$data);
    }
	
	function update_request_keluar($plat){
		$reset['request_keluar'] = 0;
		$this->db->update('slot_parkir',$reset);
		
		$data['request_keluar'] = 1;
		$this->db->where('nomor_plat_keluar',$plat);
        $this->db->update('slot_parkir',$data);
    }
	
}