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
		$data['slider'] = $this->db->query("select * from slider where website='0' order by id desc limit 0,1")->result();
		$data['newartikel'] = $this->db->query("select * from post where website='0' order by id_post desc limit 0,6")->result();
		$data['newgambar'] = $this->db->query("select * from galeri where website='0' order by id_galeri desc limit 0,6")->result();
    	$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function cari_artikel(){
		$cari = $this->input->post('cari');
		$data['page']='frontend/cari_artikel';
		$this->db->like(array('judul'=>$cari));
		$data['artikel'] = $this->db->get_where('post',array('website'=>'0'))->result();
		$data['pencarian'] = $cari;
		$data['kategori'] = $this->db->query("select * from kategori where website='0' order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post where website='0' order by id_post desc limit 0,3")->result();
    	$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function artikel(){
		$data['page'] = 'frontend/list_artikel';
		$jumlah = $this->db->get_where('post',array('website'=>'0'))->num_rows();

		$config['base_url']=base_url().'artikel';
        $config['total_rows']=$jumlah;
		$config['per_page']=6;
		
		$dari = $this->uri->segment('2');
		$this->db->limit($config['per_page'],$dari);
		$this->db->order_by('id_post','desc');
		$data['artikel'] = $this->db->get_where('post',array('website'=>'0'))->result();
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
		
		$data['kategori'] = $this->db->query("select * from kategori where website='0' order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post where website='0' order by id_post desc limit 0,3")->result();
        $this->pagination->initialize($config);
		$this->load->view('frontend/layout/m',$data);
	}
	
	//===================================================================================
	public function galeri(){
		$jumlah = $this->db->get_where('galeri',array('website'=>'0'))->num_rows();
		$data['page']='frontend/galeri';

		$config['base_url']=base_url().'galeri';
        $config['total_rows']=$jumlah;
		$config['per_page']=12;
		
		$dari = $this->uri->segment('2');
		$this->db->order_by('id_galeri','desc');
		$this->db->limit($config['per_page'],$dari);
        $data['gambar'] = $this->db->get_where('galeri',array('website'=>'0'))->result();
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
		$this->db->where(array('website'=>'0'));
		$this->db->order_by('id_post','desc');
		$data['page']='frontend/kategori_artikel';
		$data['artikel'] = $this->db->get('post')->result();
		$data['datakategori'] = $this->db->query("select * from kategori where id_kategori=$id and website='0'")->row();
		$data['kategori'] = $this->db->query("select * from kategori where website='0' order by id_kategori desc")->result();
		$data['newartikel'] = $this->db->query("select * from post where website='0' order by id_post desc limit 0,3")->result();
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
	
	
}
	