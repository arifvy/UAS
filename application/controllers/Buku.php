<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller{
	
	//membuat atribut alert 
	private $alert = '';
	
	public function __construct(){ //method ini akan selalu dijalankan
		parent::__construct();
		$this->load->helper('url'); //load helper url CI
		$this->load->model('bukuModel'); // load model bukuModel yang akan digunakan untuk proses database
	}
	
	public function index(){ 
		//ambil data dari tabel buku melalui method all dari Model bukuModel
		$data['semua'] = $this->bukuModel->all();
		//load method template
		$this->template('list',$data);
	}
	
	private function template($content,$data=null){ 
	//method ini digunakan untuk memanggil template yang telah dibuat
	// untuk dapat digunakan pada method lainnya
	//parameter $content = lokasi file view pada folder View
	//parameter $data = data yang akan dimasukkan ke file view
		$data['content'] = $this->load->view($content,$data,true);
		$this->load->view('template',$data);
	}
	private function alert($open_tag=null,$close_tag=null,$data=null){ 
	//method ini untuk membuat alert yang dapat digunakan pada method lain
		if($data!=null) $data = $open_tag.$data.$close_tag;
		return $data;
		//contoh : $this->alert('<h1>','</h1>','Hello world'); Output : <h1>Hello World</h1>
	}
	public function form(){
		//jika form disubmit
		if($this->input->post('simpan')){
			//masukkan data POST ke dalam variabel $array
			$array = array(
					'judul'=>$this->input->post('judul'),
					'pengarang'=>$this->input->post('pengarang'),
					'stok'=>$this->input->post('stok'),
			);
			//jika id nya kosong ( melakukan insert data baru )
			if($this->input->post('id')==''){
				//panggil method insert pada Model bukuModel
				if($this->bukuModel->insert($array)){
					//jika berhasil insert
					$this->alert = $this->alert("<p class='alert alert-success'>","</p>","Sukses Menyimpan"); 
				}else{
					//jika gagal insert
					$this->alert = $this->alert("<p class='alert alert-danger'>","</p>","Gagal Menyimpan");
				}
				// jika id nya tidak kosong ( melakukan update data )
			}else{
				//panggil method update pada Model bukuModel
				if($this->bukuModel->update($array,array('id'=>$this->input->post('id')))){
					//jika berhasil update
					$this->alert = $this->alert("<p class='alert alert-success'>","</p>","Sukses Menyimpan"); 
				}else{
					//jika gagal update
					$this->alert = $this->alert("<p class='alert alert-danger'>","</p>","Gagal Menyimpan");					
				}
			}
		}
		//memanggil method getWhere pada model bukuModel untuk memanggil data buku sesuai id
		//jika id kosong, maka nilai balik (return value) nya NULL
		//id diambil dari URL SEGMENT 3
		$data['satu'] = $this->bukuModel->getWhere(array('id'=>$this->uri->segment(3)))->row_array();
		//masukkan data alert hasil proses
		$data['alert'] = $this->alert;
		//memanggil method template
		$this->template('form',$data);
	}
	public function hapus(){
		//jika telah diset URI SEGMENT 3 (id buku) maka hapus data sesuai id yang diset
		//dengan memanggil method model bukuModel
		if($this->uri->segment(3)) $this->bukuModel->delete(array('id'=>$this->uri->segment(3)));
		//kemudian dialihkan ke controller Buku method index
		redirect('buku');
	}
	
}

?>