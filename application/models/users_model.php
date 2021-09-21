<?php
    class Users_Model extends CI_Model{

        public function getAll(){
            $api_url = ('http://localhost:8888/users/get/');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (is_array($response))            
                return $response;
            else{
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                throw new Exception();
            }
        }

        public function getUser($userName = NULL) {
            if (is_null($userName)) {
                $this->session->set_flashdata('error', "Message: Please select a User!");
                throw new Exception();
            }

            $api_url = ("http://localhost:8888/users/get_by_username/$userName");

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (isset($response->status)) {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");

                if ($response->status <> 200){
                    throw new Exception();
                }
            }           
            else{
                return $response;
            }
        }

        public function create() {
            $api_url = "http://localhost:8888/users/create";

            $data = array(
                'name' => $this->input->post('fullName', true),
                'zipcode' => $this->input->post('zipCode', true),
                'email' => $this->input->post('email', true),
                'username' => $this->input->post('userName', true),
                'password' => md5($this->input->post('password', true)),
                'regdate' => strtotime(date('Y-m-d H:i:s', time()))
            );

            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcGet));
            
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                throw new Exception();             
            }
        }

        public function delete($idUser) {
            $api_url = "http://localhost:8888/users/delete/$idUser";
            
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE'
            ));

            $response = json_decode(curl_exec($svcGet));
            
            curl_close($svcGet);

            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                
                throw new Exception();               
            }
        }

        public function update() {
            $idUser = $this->input->post('id', true);
            $api_url = "http://localhost:8888/users/edit/$idUser";

            $data = array(
                'id'        => (int)$idUser,
                'password'  => md5($this->input->post('password', true)),
                'name'      => $this->input->post('name', true),
                'zipcode'   => $this->input->post('zipCode', true),
                'email'     => $this->input->post('email', true),
            );

            $svcPut = curl_init();

            curl_setopt_array($svcPut, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));

            $response= json_decode(curl_exec($svcPut));

            curl_close($svcPut);
            
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");

                throw new Exception();
            }
        }
    }