<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('pelanggan_model');
	}

	public function index()
	{
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}
		
        $data['title']= ucwords('daftar pelanggan');

        $data['data'] = $this->pelanggan_model->getAll();

		$this->load->view('templates/header');
		
		$this->load->view('pelanggan/index', $data);
		$this->load->view('templates/footer');
	}

    public function view($idPelanggan = NULL) {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}
		
		$data['title'] = ucwords('Detail Pelanggan');

		if (is_null($idPelanggan)) {
			show_404();
		}

		$data['data'] = $this->pelanggan_model->getPelangganById($idPelanggan);
		
		$this->load->view('templates/header');
		$this->load->view('pelanggan/view', $data);
		$this->load->view('templates/footer');
	}

    public function create() {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$data['title'] = ucwords('Tambah Pelanggan');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kodepel', 'Kodepel', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('pelanggan/create', $data);
			$this->load->view('templates/footer');
		} else {
			$result = $this->pelanggan_model->addPelanggan(); 

			// Menggunakan Session Message
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
					<strong>Respond Error:</strong> $result->error<br />
					<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? 'pelanggan' : 'pelanggan/create');	//Jika Sukses kembali ke Index Pelanggan, jika Tidak kembali ke Form
		}
	}

    public function edit($id = false) {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$data['title'] = ucfirst('Edit Pelanggan');
		
		$this->load->library('form_validation');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kodepel', 'Kodepel', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() === FALSE){
			$data['data'] = $this->pelanggan_model->getPelangganById($id);

			if (empty($data['data'])) {
				show_404();
			}
			$this->load->view('templates/header');
			$this->load->view('pelanggan/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$result = $this->pelanggan_model->update_post();
		
			redirect('pelanggan');                      
		}
	}

    public function delete($id = NULL){
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$result = $this->pelanggan_model->delete($id);
		redirect('pelanggan'); 
	}
}