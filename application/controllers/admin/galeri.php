<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galeri extends CI_Controller{
	
	//====================================================================
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
	}
	
	//====================================================================
	function index(){
		$data['data']=$this->db->query("select * from galeri order by id_galeri desc")->result();
		$data['konten']	='admin/page/geleri_v';
		$this->load->view('admin/template/index',$data);
	}

	//====================================================================
	function tambah(){
		$data['konten']	='admin/page/tambah_galeri_v';
		$this->load->view('admin/template/index',$data);
	}

	//====================================================================
	function do_tambah(){
		$upload_config['upload_path'] ='./gambar/galeri';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image	= $this->upload->data();
		$tampil = 0;

		$data	= array(
				"judul"=>$this->input->post('judul'),
				"keterangan"=>$this->input->post('keterangan'),
				"tampil"=>$tampil,
				"gambar"=>$data_image['file_name'],
				"website"=>$this->input->post('website'),
			);
		$this->db->insert('galeri',$data);
		$this->session->set_flashdata('msg','i');
		redirect('admin/galeri');
	}
	//====================================================================
	function edit($id){
		$data['data']=$this->db->query("select * from galeri where id_galeri='$id'")->row();
		$data['konten']	='admin/page/edit_galeri_v';
		$this->load->view('admin/template/index',$data);
	}
	//====================================================================
	function update(){
		$upload_config['upload_path'] ='./gambar/galeri';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite'] = true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);

       	$this->load->library('upload', $config);
		$kode = array('id_galeri'=>$this->input->post('kode'));

		if ($this->upload->do_upload('gambar')) {
			if(file_exists($lokfk=FCPATH.'/gambar/galeri/'.$this->input->post('gambar_lama'))){
				unlink($lokfk);
			}
			$data_image	= $this->upload->data();
			$data = array(
				"judul"=>$this->input->post('judul'),
				"keterangan"=>$this->input->post('keterangan'),
				"gambar"=>$data_image['file_name'],
				"website"=>$this->input->post('website'),
			);
			$this->db->where($kode);
			$this->db->update('galeri',$data);
		}else{
			$data = array(
				"judul"=>$this->input->post('judul'),
				"keterangan"=>$this->input->post('keterangan'),
				"website"=>$this->input->post('website'),
			);
			$this->db->where($kode);
			$this->db->update('galeri',$data);
		}
		$this->session->set_flashdata('msg','e');
		redirect('admin/galeri');
	}
	//====================================================================
	function hapus($id){
		$fokat = $this->db->get_where('galeri',array('id_galeri'=>$id));
    	if($fokat->num_rows()>0){
      		$proskat=$fokat->row();
      		$namefoto=$proskat->gambar;
			if(file_exists($lokfk=FCPATH.'/gambar/galeri/'.$namefoto)){unlink($lokfk);}
		}

		$this->db->where('id_galeri',$id);
		$this->db->delete('galeri');
		$this->session->set_flashdata('msg','h');
		redirect('admin/galeri');
	}
}