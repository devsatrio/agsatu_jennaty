<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends CI_Controller{

	//===============================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	
	//===============================================================================
	function index(){
		$data['data']=$this->db->query("select * from slider order by id desc")->result();
		$data['konten']	='admin/page/slider_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//===============================================================================
	function tambah(){
		$data['konten']	='admin/page/tambah_slider_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//===============================================================================
	function do_tambah(){
		$upload_config['upload_path'] =realpath(APPPATH.'../gambar/slider/');
		$upload_config['allowed_types'] = 'jpg|png|jpeg';	
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();
		$data	=array("link"=>$this->input->post('link'),"judul"=>$this->input->post('judul'),"keterangan"=>$this->input->post('keterangan'),"url_gambar"=>$data_image['file_name']);				
		$this->db->insert('slider',$data);
		$this->session->set_flashdata('msg','i');
		redirect("admin/slider");
	}
	
	//===============================================================================
	function hapus($id){
		$data=$this->db->query("select url_gambar from slider where id=$id")->result_array();
		$image_nm= $data[0]['url_gambar'];
		$del="gambar/slider/".$image_nm;
      	unlink($del);

		$this->db->where('id',$id);
		$this->db->delete('slider');
		$this->session->set_flashdata('msg','h');
		redirect("admin/slider");
	}
}