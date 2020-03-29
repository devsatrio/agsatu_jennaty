<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Halaman extends CI_Controller{
	
	//======================================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('login');
		}
	}
	
	//======================================================================================
	function index(){
		$data['halaman']=$this->db->query("select * from halaman order by id_halaman desc")->result();
		$data['konten']	='admin/page/halaman_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//======================================================================================
	function do_tambah_halaman(){
		$data_insert = array(
			'nama_halaman'=>$this->input->post('nama_halaman'),
			'bentuk_halaman'=>$this->input->post('bentuk'),
			'website'=>$this->input->post('website'),
		);
		$this->db->insert('halaman',$data_insert);
		$data_insert['id'] = $this->db->insert_id();
		$data_insert['bentuk'] = $data_insert['bentuk_halaman']==1 ? "Tunggal":"Jamak";
		$data = array("tanggal"=>date("Y-m-d"),'isi'=>'','id_halaman'=>$data_insert['id']);
		$this->db->insert('tunggal',$data);
		$this->session->set_flashdata('msg','i');
		redirect('admin/halaman');
	}
	
	//======================================================================================
	function hapus($id){
		$this->db->where('id_halaman',$id);
		$this->db->delete('halaman');
		$this->session->set_flashdata('msg','h');
		redirect('admin/halaman');
	}

	//======================================================================================
	function edit_halaman(){
		$data=array(
			'nama_halaman'=>$this->input->post('nama_halaman'),
			'bentuk_halaman'=>$this->input->post('bentuk'),
			'website'=>$this->input->post('website'),
		);
		$this->db->where('id_halaman',$this->input->post('id_halaman'));
		$this->db->update('halaman',$data);
		$data['bentuk']	=($data['bentuk_halaman']==1) ? "Tunggal":"Jamak";
		$this->session->set_flashdata('msg','h');
		redirect('admin/halaman');
	}
	
	//======================================================================================
	function edit_tunggal($id){
		$data['halaman']=$this->db->get('halaman')->result();
		$data['tunggal']=$this->db->query("select * from tunggal where id_halaman='$id'")->row();
		$data['konten']	='admin/page/edit_tunggal_v';
		$this->load->view('admin/template/index',$data);
	}

	//======================================================================================
	function do_edit_tunggal(){
		
		$data	=array(
			'isi'=>$this->master->replace_tag($this->input->post('isi')),
			'tanggal'=>$this->master->get_date($this->input->post('tanggal')));
		$this->db->where('id_tunggal',$this->input->post('id_tunggal'));
		$this->db->update('tunggal',$data);
		redirect(base_url("admin/halaman"));
	}
	
	//======================================================================================
	function edit_jamak($id){
		$data['halaman']=$this->db->get('halaman')->result();
		$data['jamak']	=$this->db->query("select * from majemuk where id_halaman='$id'")->result();
		$data['konten']	='admin/page/edit_jamak_v'; 
		$data['id_jamak'] = $id;
		$this->load->view('admin/template/index',$data);
	}
	
	
	
}