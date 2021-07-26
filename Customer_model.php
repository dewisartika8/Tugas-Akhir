<?php
class Customer_model extends CI_Model{
 
    function get_all_customer(){
        $hasil=$this->db->get('customer');
        return $hasil->result();
    }
	
	function get_row($id){
        $hasil=$this->db->where('id',$id)->get('customer');
        return $hasil->row();
    }
	
	function get_by_plat($nomor_plat){
        $hasil=$this->db->where('nomor_plat',$nomor_plat)->limit(1)->order_by('id',"DESC")->get('customer');
        return $hasil->row();
    }
	
	function get_last_row(){
        $hasil=$this->db->limit(1)->order_by('id',"DESC")->get('customer');
        return $hasil->row();
    }
	
	function get_request_keluar(){
        $hasil=$this->db->where('request_keluar','1')->limit(1)->order_by('id',"DESC")->get('customer');
        return $hasil->row();
    }
     
    function insert($data){
		$this->db->insert('customer',$data);
		return $this->db->insert_id();
    }
	
	function update($id,$data){
		$this->db->where('id',$id);
        $this->db->update('customer',$data);
    }
	
	function update_by_plat($plat,$data){
		$this->db->where('nomor_plat_masuk',$plat);
        $this->db->update('customer',$data);
    }
	
	function update_latest($data){
		$hasil = $this->db->limit(1)->order_by('id',"DESC")->get('customer');
        $row = $hasil->row();

		$this->db->where('id',$row->id);
        $this->db->update('customer',$data);
    }
	
	function update_request_keluar($plat){
		$reset['request_keluar'] = 0;
		$this->db->update('customer',$reset);
		
		$data['request_keluar'] = 1;
		$this->db->where('nomor_plat_masuk',$plat);
        $this->db->update('customer',$data);
    }
	
	function get_today_rows(){
        $hasil=$this->db->where('DATE(waktu_masuk) = CURDATE()')->get('customer');
        return $hasil->num_rows();
    }
	
	function get_week_rows(){
        $hasil=$this->db->where('YEARWEEK(waktu_masuk, 1) = YEARWEEK(CURDATE(), 1)')->get('customer');
        return $hasil->num_rows();
    }
	
	function get_month_rows(){
        $hasil=$this->db->where('MONTH(waktu_masuk) = MONTH(CURDATE())')->get('customer');
        return $hasil->num_rows();
    }
	
	function get_year_rows(){
        $hasil=$this->db->where('YEAR(waktu_masuk) = YEAR(CURDATE())')->get('customer');
        return $hasil->num_rows();
    }
	
}