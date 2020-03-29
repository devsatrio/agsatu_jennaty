<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller{
	
	//=================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('login');
		}
    }
	
	//=================================================================
	function index(){
		$this->db->order_by('id','desc');
		$data['menu']	=$this->db->get('menu')->result();
		$data['halaman']=$this->db->get('halaman')->result();
		$data['konten']	='admin/page/menu_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//=================================================================
	function do_tambah_menu(){
		$data_insert	=array(
			'nama_menu'=>$this->input->post('nama_menu'),
			'id_halaman'=>$this->input->post('halaman'),
			'website'=>$this->input->post('website'),
		);
		$this->db->insert('menu',$data_insert);
		$this->session->set_flashdata('msg','i');
		redirect('admin/menu');
	}
	
	//=================================================================
	function edit_menu(){
		$data = array(
			'nama_menu'=>$this->input->post('nama_menu'),
			'id_halaman'=>$this->input->post('halaman'),
			'website'=>$this->input->post('website'),
		);
		$id_menu=$this->input->post('id_menu');
		$this->db->where('id',$id_menu);
		$this->db->update('menu',$data);
		$this->session->set_flashdata('msg','e');
		redirect('admin/menu');
	}
	
	//=================================================================
	function hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('menu');
		$this->session->set_flashdata('msg','h');
		redirect('admin/menu');
	}
}