<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Submenu extends CI_Controller{
	
	//===================================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
	}
	
	//===================================================================================
	function index(){
		$this->db->where(array('id_halaman'=>0));
		$data['menu']	=$this->db->get('menu')->result();
		$data['submenu']=$this->db->query("SELECT *,submenu.website AS menuwebsite from submenu join menu on menu.id=submenu.id_menu join halaman on halaman.id_halaman=submenu.id_halaman order by submenu.id_submenu desc")->result();
		$data['halaman']=$this->db->get('halaman')->result();
		$data['konten']	='admin/page/submenu_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//===================================================================================
	function do_tambah_menu(){
		$data_insert	=array(
			'nama_submenu'=>$this->input->post('nama_submenu'),
			'id_halaman'=>$this->input->post('halaman'),
			'id_menu'=>$this->input->post('menu'),
			'website'=>$this->input->post('website'),
		);
		$this->db->insert('submenu',$data_insert);
		$this->session->set_flashdata('msg','i');
		redirect('admin/submenu');
	}
	
	//===================================================================================
	function edit_menu(){
		$data	=array(
			'nama_submenu'=>$this->input->post('nama_submenu'),
			'id_halaman'=>$this->input->post('halaman'),
			'id_menu'=>$this->input->post('menu'),
			'website'=>$this->input->post('website'),
		);
		$id		=$this->input->post('id_submenu');
		$this->db->where('id_submenu',$id);
		$this->db->update('submenu',$data);
		$this->session->set_flashdata('msg','e');
		redirect('admin/submenu');
	}
	
	//===================================================================================
	function hapus($id){
		$this->db->where('id_submenu',$id);
		$this->db->delete('submenu');
		$this->session->set_flashdata('msg','i');
		redirect('admin/submenu');
	}
}