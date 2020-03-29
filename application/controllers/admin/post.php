<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller{
	
	//======================================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('login');
		}
	}

	//======================================================================================
	function index(){
		$data['data']=$this->db->query("select * from post left join kategori on kategori.id_kategori=post.id_kategori order by post.id_post desc")->result();
		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/post_v';
		$this->load->view('admin/template/index',$data);
	}

	//======================================================================================
	function tambah(){
		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/tambah_post_v';
		$this->load->view('admin/template/index',$data);
	}

	//======================================================================================
	function do_tambah(){
		$upload_config['upload_path'] = realpath(APPPATH.'../gambar/post/');
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		
		$this->upload->do_upload('gambar');
		$data_image	= $this->upload->data();
		$cek = $this->input->post('tampil');
		$kategori = explode('-',$this->input->post('kategori'));
		$tampil = 0;
		$data = array(
			"judul"=>$this->input->post('judul'),
			"tanggal"=>$this->input->post('tanggal'),
			"isi"=>$this->master->replace_tag($this->input->post('isi')),
			"id_kategori"=>$kategori[0],
			"tampil"=>$tampil,
			"gambar"=>$data_image['file_name'],
			"website"=>$kategori[1],
		);

		$this->db->insert('post',$data);
		$this->session->set_flashdata('msg','i');
		redirect('admin/post');
	}

	//======================================================================================
	function edit($id){
		$data['kategori']	=$this->db->get("kategori")->result();
		$this->db->where("id_post",$id);
		$data['data']		=$this->db->get("post")->row();
		$data['konten']		='admin/page/edit_post_v';
		$this->load->view('admin/template/index',$data);
	}

	//======================================================================================
	function do_edit(){
		$upload_config['upload_path'] = realpath(APPPATH.'../gambar/post/');
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);

       	$this->load->library('upload', $config);
		$kode = array('kode'=>$this->input->post('kode'));
		$kategori = explode('-',$this->input->post('kategori'));

		if ($this->upload->do_upload('gambar')) {
			if(file_exists($lok=FCPATH.'/gambar/post/'.$this->input->post('gambar_lama'))){
				unlink($lok); }
			$data_image		=$this->upload->data();
			$data	=array(
				"judul"=>$this->input->post('judul'),
				"tanggal"=>date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
				"isi"=>$this->master->replace_tag($this->input->post('isi')),
				"id_kategori"=>$kategori[0],
				"gambar"=>$data_image['file_name'],
				"website"=>$kategori[1],
			);
			$this->db->where('id_post',$this->input->post('id_post'));
			$this->db->update('post',$data);
		}else{
			$data = array(
				"judul"=>$this->input->post('judul'),
				"tanggal"=>date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
				"isi"=>$this->master->replace_tag($this->input->post('isi')),
				"id_kategori"=>$kategori[0],
				"website"=>$kategori[1],
			);
			$this->db->where('id_post',$this->input->post('id_post'));
			$this->db->update('post',$data);
		}
		$this->session->set_flashdata('msg','e');
		redirect('admin/post');
	}

	//======================================================================================
	function hapus($id){
		$this->db->where('id_post',$id);
		$data = $this->db->get("post")->row();

		if($data->gambar!=''){
			if(file_exists($lok=FCPATH.'/gambar/post/'.$data->gambar)){
				unlink($lok);
			}
		}
		
		$this->db->where('id_post',$id);
		$this->db->delete('post');
		$this->session->set_flashdata('msg','h');
		redirect('admin/post');
	}
}