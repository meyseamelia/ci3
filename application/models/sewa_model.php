<?php
    class Sewa_Model extends CI_Model{
        public function getAll(){
            $api_url = ('http://localhost:8081/sewa/');

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
            
            if(is_object($response)) {
                $this->session->set_flashdata('error',
                    "Respond Status: $response->status<br>
                    Error: $response->error<br>
                    Message: " . (empty($response->message) ? "---" : $response->message)
                );

                throw new Exception();
            }
                    
            return $response;
        }

        public function getSewaById($idSewa){
            $api_url = ("http://localhost:8081/sewa/$idSewa");

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

        public function getSewaDetailById($idSewa = NULL) {
            $api_url = ("http://localhost:8081/sewa/detail/$idSewa");
            // die($api_url);

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

        public function save() {
            $api_url = "http://localhost:8081/sewa/save";

            $data = array(
                'isbn' => $this->input->post('isbn', true),
                'pelangganid' => $this->input->post('pelanggan', true),
                'tglsewa' => date('Y-m-d', time()),
                // 'tglsewa' => DateTime
                'lamasewa' => $this->input->post('lamaSewa', true),
                'keterangan' => $this->input->post('keterangan', true)
            );

            $svcPost = curl_init();

            curl_setopt_array($svcPost, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcPost));

            curl_close($svcPost);

            // var_dump($response); die();
            if ($response->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $response->status; Message: $response->message");
                return false;               
            }          
        }

        public function delete($idSewa) {
            $api_url = "http://localhost:8888/sewa/$idSewa";
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE'
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }
    }