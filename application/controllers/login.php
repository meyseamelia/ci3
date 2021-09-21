<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('login_model');
    }

    public function index() {
        $data['title'] = ucwords('login');

        $this->load->library('form_validation');
		$this->form_validation->set_rules('userEmail', 'User E-Mail', 'required');
		$this->form_validation->set_rules('userPass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){            
            $this->load->view('templates/header');
            $this->load->view('login/index', $data);                
            $this->load->view('templates/footer');
        }
        else {
            try {
                $response = $this->login_model->request_login();

                redirect('salam','refresh');
            }
            catch (Exception $ex) {
                redirect('login','refresh');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
            
        redirect('login','refresh');      }
}
