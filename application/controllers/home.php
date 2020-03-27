<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	
	//===================================================================================
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	
	//===================================================================================
	public function index(){
		$data['page']	='frontend/index';
		$data['slider'] = $this->db->query("select * from slider order by id desc limit 0,1")->result();
		$data['newartikel'] = $this->db->query("select * from post order by id_post desc limit 0,6")->result();
		$data['newgambar'] = $this->db->query("select * from galeri order by id_galeri desc limit 0,6")->result();
    	$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function cari_artikel(){
		$cari = $this->input->post('cari');
		$data['page']='frontend/cari_artikel';
		$this->db->like(array('judul'=>$cari));
		$data['artikel'] = $this->db->get('post')->result();
		$data['pencarian'] = $cari;
		$data['kategori'] = $this->db->query("select * from kategori order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post order by id_post desc limit 0,3")->result();
    	$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function artikel(){
		$data['page'] = 'frontend/list_artikel';
		$jumlah = $this->db->get('post')->num_rows();

		$config['base_url']=base_url().'artikel';
        $config['total_rows']=$jumlah;
		$config['per_page']=6;
		
		$dari = $this->uri->segment('2');
		$this->db->limit($config['per_page'],$dari);
		$this->db->order_by('id_post','desc');
		$data['artikel'] = $this->db->get('post')->result();
		$config['full_tag_open'] = "<div class='post-pagination'>";
        $config['full_tag_close'] ="</div>";
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['cur_tag_open'] = "<a href='#'>";
		$config['cur_tag_close'] = "</a>";
		$config['cur_page'] = $dari;
        $config['next_tag_open'] = "";
        $config['next_tagl_close'] = "";
        $config['prev_tag_open'] = "";
        $config['prev_tagl_close'] = "";
        $config['first_tag_open'] = "";
        $config['first_tagl_close'] = "";
        $config['last_tag_open'] = "";
        $config['last_tagl_close'] = "";
        $config['first_link'] = "<i class='fa fa-angle-right'></i>";
		$config['last_link'] = "<i class='fa fa-angle-left'></i>";
		
		$data['kategori'] = $this->db->query("select * from kategori order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post order by id_post desc limit 0,3")->result();
        $this->pagination->initialize($config);
		$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function galeri(){
		$jumlah = $this->db->get('galeri')->num_rows();
		$data['page']='frontend/galeri';

		$config['base_url']=base_url().'galeri';
        $config['total_rows']=$jumlah;
		$config['per_page']=12;
		
		$dari = $this->uri->segment('2');
		$this->db->order_by('id_galeri','desc');
		$this->db->limit($config['per_page'],$dari);
        $data['gambar'] = $this->db->get('galeri')->result();
		$config['full_tag_open'] = "<div class='post-pagination'>";
        $config['full_tag_close'] ="</div>";
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['cur_tag_open'] = "<a href='#'>";
		$config['cur_tag_close'] = "</a>";
		$config['cur_page'] = $dari;
        $config['next_tag_open'] = "";
        $config['next_tagl_close'] = "";
        $config['prev_tag_open'] = "";
        $config['prev_tagl_close'] = "";
        $config['first_tag_open'] = "";
        $config['first_tagl_close'] = "";
        $config['last_tag_open'] = "";
        $config['last_tagl_close'] = "";
        $config['first_link'] = "<i class='fa fa-angle-right'></i>";
        $config['last_link'] = "<i class='fa fa-angle-left'></i>";
        $this->pagination->initialize($config);
		$this->load->view('frontend/layout/m',$data);
	}
	//===================================================================================
	function kategori(){
		$id	= $this->uri->segment(3);
		$this->db->where(array('id_kategori'=>$id));
		$this->db->order_by('id_post','desc');
		$data['page']='frontend/kategori_artikel';
		$data['artikel'] = $this->db->get('post')->result();
		$data['datakategori'] = $this->db->query("select * from kategori where id_kategori=$id")->row();
		$data['kategori'] = $this->db->query("select * from kategori order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post order by id_post desc limit 0,3")->result();
    	$this->load->view('frontend/layout/m',$data);
		
	}
	//===================================================================================
	function page(){
		$id				=$this->uri->segment(2);
		$data['data']	=$this->master->tampil_tunggal($id);
		$data['page'] 	='frontend/detail';
		$this->load->view('frontend/layout/m',$data);
	}

	//===================================================================================
	function jamak($id="",$bentuk,$judul="",$page=0){
		$judul = $this->uri->segment(4);
		$jumlah = $this->db->query("select * from majemuk where id_halaman='$id'")->num_rows();
		
		$config['base_url']=base_url().'read/'.$id.'/2/'.$judul;
        $config['total_rows']=$jumlah;
		$config['per_page']=9;
		
		$dari = $this->uri->segment('5');
		$this->db->limit($config['per_page'],$dari);
		$this->db->order_by('id_majemuk','desc');
        $data['data'] = $this->db->get_where("majemuk", array('id_halaman' => $id))->result();
		$config['full_tag_open'] = "<div class='post-pagination'>";
        $config['full_tag_close'] ="</div>";
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['cur_tag_open'] = "<a href='#'>";
		$config['cur_tag_close'] = "</a>";
		$config['cur_page'] = $dari;
        $config['next_tag_open'] = "";
        $config['next_tagl_close'] = "";
        $config['prev_tag_open'] = "";
        $config['prev_tagl_close'] = "";
        $config['first_tag_open'] = "";
        $config['first_tagl_close'] = "";
        $config['last_tag_open'] = "";
        $config['last_tagl_close'] = "";
        $config['first_link'] = "<i class='fa fa-angle-right'></i>";
        $config['last_link'] = "<i class='fa fa-angle-left'></i>";
        $this->pagination->initialize($config);
		$data['judul']	=$this->master->get_judul_jamak($id);
		$data['page'] 	='frontend/list';
		$this->load->view('frontend/layout/m',$data);
	}
	//===================================================================================
	function view_detail_jamak($id,$judul){
		$data['data']	=$this->master->tampil_jamak($id);
		$data['page'] 	='frontend/detail_jamak';
		$this->load->view('frontend/layout/m',$data);
	}
	//===================================================================================
	function detail_jamak(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id_jamak		=$this->uri->segment(7);
		$id_halaman		=$this->uri->segment(6);
		$data['data']	=$this->master->tampil_jamak($id_jamak);
		
	 	$data['latest'] = $this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori AND k.nama_kategori='Berita' ORDER BY tanggal DESC limit 0,6")->result();
	 	$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
	 	$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='frontend/detail_jamak';
		$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	function detail_post($id){
		$id				=$this->uri->segment(3);
		$data['data']	=$this->db->query("SELECT * FROM post WHERE id_post=$id")->row();
		$data['page'] 	='frontend/detail_artikel';
		$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	function post($id,$judul,$page=0){
		$this->load->library('pagination');
		$jum=$this->db->query("select * from post where id_kategori='$id'");
		$config['base_url']=base_url()."read/post/$id/$judul/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=10;
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		
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
		
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$data['data']	=$this->db->query("select * from post join kategori on kategori.id_kategori=post.id_kategori where post.id_kategori='$id' limit $page,{$config['per_page']}")->result();
		$data['halaman']=$this->pagination->create_links();
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/post';
		$data['slider']	='template/slider';
		$this->load->view('template/index',$data);
	}
	
	
	
	
	
	function detail(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(7);
		$kategori		=$this->uri->segment(6);
		$data['data']	=$this->master->tampil_post($id,$kategori);
		 
		if($kategori==1){
			$data['lainya']	=$this->db->query("select * from post where id_kategori='$kategori' order by rand() limit 0,10")->result();
		}else{
			$data['lainya']	=$this->db->query("select * from post where id_kategori='2' OR id_kategori='3' order by rand() limit 0,10")->result();
		}

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();
		
		$data['page'] 	='page/detail';
		$this->load->view('template/index',$data);
	}
	
	function galleri_arsip(){
		$data['menu']	=$this->db
							->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['galeri']	=$this->db
							->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='arsip' ")->result();
		$data['berita']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='arsip'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['agenda']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/galleri_arsip';
		$this->load->view('template/index',$data);
	}

	function galleri_perpus(){
		$data['menu']	=$this->db
							->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['galeri']	=$this->db
							->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='perpustakaan' ")->result();
		$data['berita']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='perpustakaan'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['agenda']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/galleri_perpus';
		$this->load->view('template/index',$data);
	}

	function profil(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		// $data['galeri']	=$this->db->query("select * from galeri")->result();
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/profil';
		$this->load->view('template/index',$data);
	}
	
	function search(){
		$key	=addslashes($this->input->get('q'));
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['data']	=$this->db->query("select * from post join kategori on kategori.id_kategori=post.id_kategori where post.judul like '%$key%'")->result();
		 
		
		$data['page'] 	='page/cari';
		$data['slider']	='template/slider';
		$this->load->view('template/index',$data);
	}
	
	function get_image_galeri($id){
		$data	=$this->db->query("select gambar from galeri where id_galeri='$id'")->row();
		$hasil['gambar']=$data->gambar1;
		echo json_encode($hasil);
	}

	function berita_agenda($id=0){

		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);

		if($id=="")	$id=0;

		$this->load->library('pagination');
		$jum=$this->db->query("SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC");
		$config['base_url']=base_url()."read/post/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=3;
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		
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
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$data['latest'] = $this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC limit 0,6")->result();

		$data['halaman']=$this->pagination->create_links();
		
		$data['data']	=$this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC limit $id,{$config['per_page']}")->result();
			 
		$data['page'] 	='page/post';
		$this->load->view('template/index',$data);
	}

	

	// Download Center
	function downloadcenter($id=0){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);
		
		$data['data']	=$this->db->query("select * from download_center a 
									JOIN file_download b ON a.id_download=b.id_download")->result();

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/download_v';
		$this->load->view('template/index',$data);
	}

	function berita(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);
		
		$data['berita']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Berita'  ORDER BY tanggal DESC limit 0,10")->result();;

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/berita_v';
		$this->load->view('template/index',$data);
	}

	function pendaftaran(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);		
		$data['page'] 	='page/pendaftaran';
		$this->load->view('template/index',$data);
	}

	function tambah_member(){
		$getPost = $this->input->post(null, true);

    	$add['tgl'] = date('Y-m-d');
    	$add['nik'] = $getPost['nik'];
    	$add['nama'] = $getPost['nama'];
    	$add['tempat_lhr'] = $getPost['tempat_lhr'];
    	$add['tgl_lhr'] = $getPost['tgl_lhr'];
    	$add['jenkel'] = $getPost['jenkel'];
    	$add['alamat'] = $getPost['alamat'];
    	$add['kecamatan'] = $getPost['kecamatan'];
    	$add['propinsi'] = $getPost['propinsi'];
    	$add['rt'] = $getPost['rt'];
    	$add['rw'] = $getPost['rw'];
    	$add['kota'] = $getPost['kota'];
    	$add['kelurahan'] = $getPost['kelurahan'];
    	$add['hp'] = $getPost['hp'];
    	$add['agama'] = $getPost['agama'];
    	$add['pekerjaan'] = $getPost['pekerjaan'];
    	$add['namainstitusi'] = $getPost['namainstitusi'];
    	$add['alamatinstitusi'] = $getPost['alamatinstitusi'];
    	$add['prodi'] = $getPost['prodi'];
    	$add['kelas'] = $getPost['kelas'];
    	$add['email'] = $getPost['email'];
    	$add['ibukandung'] = $getPost['ibukandung'];
    	$add['namakeluarga'] = $getPost['namakeluarga'];
    	$add['statuskeluarga'] = $getPost['statuskeluarga'];
    	$add['hpkeluarga'] = $getPost['hpkeluarga'];

    	$upload_config['upload_path'] ='./gambar/member/';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();
    	$add['gambar'] = $data_image['file_name'];

    	$upload_config['upload_path'] ='./gambar/member/';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('foto');
		$data_image		=$this->upload->data();
    	$add['foto'] = $data_image['file_name'];
    	// print_r($add); exit();

		$insert = $this->db->insert('member', $add);
		redirect('home/pendaftaran');

	}

	function aduan(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);		
		$data['page'] 	='page/aduan_v';
		$this->load->view('template/index',$data);
	}

    function simpan_aduan(){
        $getPost = $this->input->post(null,true);
        $add['nama']  = $getPost['nama'];
        $add['isi'] = $getPost['keperluan'];

        $simpan = $this->db->insert('aduan',$add);
        if ($simpan > 0) {
            echo '<script>alert("Data berhasil dikirim");</script>';
            redirect('read/kritiksaran', 'refresh');
        }else {
            echo '<script>alert("DATA GAGAL DIKIRIM !!!!!!");</script>';
            redirect('read/kritiksaran');
        }
    }
	
	function cek_data(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		// $id				=$this->uri->segment(3);		
		$data['page'] 	='page/cek_data_v';
		$this->load->view('template/index',$data);
	}

    function cek_($nama=''){
		$data = $this->db->get_where("arsip_imb", array('nama_pemilik' => $nama))->row();
		// print_r($data);
		// echo $data->id_arsip_imb; exit();
		if ($data->id_arsip_imb != 0) {
			$json = array('status' => '1');
		} else {
			$json = array('status' => '0');
		}

		// print_r($json);exit();
		echo json_encode($json);
    }


	// function detail_file($id,$judul){
	// 	$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
	// 	$id				=$this->uri->segment(3);
	// 	$data['data']	=$this->db->query("select * from download_center where id_download='$id'")->row();
		 
	// 	$data['file']	=$this->db->query("select * from file_download where id_download='$id'")->result();

	// 	$data['page'] 	='page/detail_download_v';
	// 	$this->load->view('template/index',$data);
	// }

	function download($file){
		header("Content-Type: application/force-download");
		header("content-disposition: attachment;filename=$file");
		readfile(base_url() . "gambar/produk_hukum/$file");
	}
}
	