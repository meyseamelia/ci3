<?php
    class Pelanggan_Model extends CI_Model{
        public function getAll(){
            $api_url = ('http://localhost:8081/pelanggan');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function getPelangganById($idPelanggan) {
            $api_url = "http://localhost:8081/pelanggan/$idPelanggan";
            
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));
            // var_dump($response); die();

            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");

            return false;               
        }

        public function addPelanggan() {
            $api_url = "http://localhost:8081/pelanggan";

            $data = array(
                'nama' => $this->input->post('nama', true),
                'kodepel' => $this->input->post('kodepel', true),
                'email' => $this->input->post('email', true),
                'telp' => $this->input->post('telp', true),
                'alamat' => $this->input->post('alamat', true),
                'jk' => $this->input->post('jk', true)
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
                return false;               
            }          
        }

        public function update_post() {
            $id = $this->input->post('id');
            $api_url = "http://localhost:8081/pelanggan/$id";

            $data = json_encode(array(
                'id' => (int)$this->input->post('id'),
                'nama' => $this->input->post('nama', true),
                'kodepel' => $this->input->post('kodepel', true),
                'email' => $this->input->post('email', true),
                'telp' => $this->input->post('telp', true),
                'alamat' => $this->input->post('alamat', true),
                'jk' => $this->input->post('jk', true)
            ));

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));

            $response= json_decode(curl_exec($curl));

            curl_close($curl);
            
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                return false;               
            }
        }

        public function delete($id) {
            $api_url = "http://localhost:8888/pelanggan/$id";
            
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE'
            ));

            $response = json_decode(curl_exec($svcGet));
            // var_dump($response); die();

            curl_close($svcGet);

            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                return false;               
            }
        }
        
    }

?>