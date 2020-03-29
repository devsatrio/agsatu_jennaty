<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index(){
		$data['menu']	=$this->db->get('menu')->result();
		$data['halaman']=$this->db->get('halaman')->result();

		$data['jumlah_user']=$this->db->get('admin')->num_rows();
		$data['jumlah_halaman']=$this->db->get('halaman')->num_rows();
		$data['jumlah_galeri']=$this->db->get('galeri')->num_rows();
		$data['jumlah_artikel']=$this->db->get('post')->num_rows();
		
		$data['jumlah_halaman_haji']=$this->db->get_where('halaman',array('website'=>'0'))->num_rows();
		$data['jumlah_galeri_haji']=$this->db->get_where('galeri',array('website'=>'0'))->num_rows();
		$data['jumlah_artikel_haji']=$this->db->get_where('post',array('website'=>'0'))->num_rows();

		$data['jumlah_halaman_travel']=$this->db->get_where('halaman',array('website'=>'1'))->num_rows();
		$data['jumlah_galeri_travel']=$this->db->get_where('galeri',array('website'=>'1'))->num_rows();
		$data['jumlah_artikel_travel']=$this->db->get_where('post',array('website'=>'1'))->num_rows();
		
		$data['konten']	='admin/page/dashboard_v';
		$this->load->view('admin/template/index',$data);
	}
}