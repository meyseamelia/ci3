<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salam extends CI_Controller {

	public function index()
	{
        $testy['title'] = ucwords('salam');
        $testy['par'] = ucwords('Selamat datang');

        $this->load->view('templates/header');
		$this->load->view('salam/index', $testy);
		$this->load->view('templates/footer');
	}

    public function view($kamu = NULL) {
        if(is_null($kamu)) {
            $kamu = "Kamu";
        }

        $data['title'] = ucwords('salam');
        $data['kamu'] = $kamu;

        $this->load->view('templates/header');
		$this->load->view('salam/view', $data);
		$this->load->view('templates/footer');
    }
}
