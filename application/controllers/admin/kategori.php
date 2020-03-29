<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori extends CI_Controller{
	//===============================================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('login');
		}
    }
	
	//===============================================================================================
	function index(){
		$this->db->order_by('id_kategori','desc');
		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/kategori_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//===============================================================================================
	function do_tambah_kategori(){
		$data	=array(
			'nama_kategori'=>$this->input->post('nama_kategori'),
			'website'=>$this->input->post('website'),
		);
		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('msg','i');
		redirect('admin/kategori');
	}
	
	//===============================================================================================
	function edit_kategori(){
		$data = array(
			'nama_kategori'=>$this->input->post('nama_kategori'),
			'website'=>$this->input->post('website'),
		);
		$id	= $this->input->post('id_kategori');
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori',$data);
		$this->session->set_flashdata('msg','e');
		redirect('admin/kategori');
	}
	
	//===============================================================================================
	function hapus($id){
		$this->db->where('id_kategori',$id);
		$this->db->delete('kategori');
		$this->session->set_flashdata('msg','h');
		redirect('admin/kategori');
	}
}