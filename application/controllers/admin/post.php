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
		$cek	= $this->input->post('tampil');
		$tampil = 0;
		$data = array(
			"judul"=>$this->input->post('judul'),
			"tanggal"=>$this->input->post('tanggal'),
			"isi"=>$this->master->replace_tag($this->input->post('isi')),
			"id_kategori"=>$this->input->post('kategori'),
			"tampil"=>$tampil,
			"gambar"=>$data_image['file_name'],
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

		if ($this->upload->do_upload('gambar')) {
			if(file_exists($lok=FCPATH.'/gambar/post/'.$this->input->post('gambar_lama'))){
				unlink($lok); }
			$data_image		=$this->upload->data();
			$data	=array("judul"=>$this->input->post('judul'),"tanggal"=>date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
						"isi"=>$this->master->replace_tag($this->input->post('isi')),"id_kategori"=>$this->input->post('kategori'),"gambar"=>$data_image['file_name']);
			//$data['slider']	=($cek=="on") ? 1:0;
			$this->db->where('id_post',$this->input->post('id_post'));
			$this->db->update('post',$data);$data	=array("judul"=>$this->input->post('judul'),"tanggal"=>date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
						"isi"=>$this->master->replace_tag($this->input->post('isi')),"id_kategori"=>$this->input->post('kategori'));
			//$data['slider']	=($cek=="on") ? 1:0;
			$this->db->where('id_post',$this->input->post('id_post'));
			$this->db->update('post',$data);
		}else{
			$data	=array("judul"=>$this->input->post('judul'),"tanggal"=>date_format(date_create($this->input->post('tanggal')), 'Y-m-d'),
						"isi"=>$this->master->replace_tag($this->input->post('isi')),"id_kategori"=>$this->input->post('kategori'));
			//$data['slider']	=($cek=="on") ? 1:0;
			$this->db->where('id_post',$this->input->post('id_post'));
			$this->db->update('post',$data);
		}
		$this->session->set_flashdata('msg','e');
		redirect('admin/post');
	}

	//======================================================================================
	function cari($kategori="",$id=0){
		$this->load->library('pagination');
		if($this->uri->segment(4)==""){
			$kategori	=$this->input->post('kategori');
		}else{
			$kategori	=$this->uri->segment(4);
		}
		$jum=$this->db->query("select * from post where id_kategori='$kategori' ");
		$config['base_url']=base_url()."admin/post/cari/$kategori/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=10;

		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul></div>';

		$config['first_link'] = '&laquo; Pertama';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Terakhir &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Selanjutnya &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Sebelumnya';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$config['uri_segment'] = 5;

		$this->pagination->initialize($config);
		$data['data']	=$this->db->query("select * from post join kategori on kategori.id_kategori=post.id_kategori where post.id_kategori='$kategori' limit $id,{$config['per_page']}")->result();
		$data['halaman']=$this->pagination->create_links();

		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/post_cari_v';
		$data['id_kategori']=$kategori;
		$this->load->view('admin/template/index',$data);

	}
	function hapus($id){
		$this->db->where('id_post',$id);
		$this->db->delete('post');
		$this->session->set_flashdata('msg','h');
		redirect('admin/post');
	}
}