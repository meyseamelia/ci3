<?php

    class Buku_Model extends CI_Model {
        public function getAll() {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/buku/";
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));
            
            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function getBukuByJudul($judulBuku) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/buku/judul/$judulBuku";
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
                show_404();
        }

        public function getBukuById($idBuku) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/buku/$idBuku";
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));

            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function addBuku() {
            $api_url = "http://localhost:8081/buku/";

            $data = array(
                'judul' => $this->input->post('judul', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tglterbit' => $this->input->post('tglTerbit', true),
                'isbn' => $this->input->post('isbn', true),
                'userid' => $this->input->post('userId', true)
            );
            // var_dump($data); die();

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

            curl_close($svcGet);

            if (!is_null($response))            
                return $response;
            else
                show_404();            
        }

        public function deleteBuku($idBuku) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/buku/$idBuku";

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

            if (!is_null($response))            
                return $response;
            else
                show_404();
        }

        public function editBuku($idBuku) {
            //Mengakses Web Service menggunakan HTTP Request
            $api_url = "http://localhost:8081/buku/$idBuku";

            $data = array(
                'id' => $this->input->post('id', true),
                'judul' => $this->input->post('judul', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tglterbit' => $this->input->post('tglTerbit', true),
                'isbn' => $this->input->post('isbn', true),
                'userid' => $this->input->post('userId', true)
            );

            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcGet));

            curl_close($svcGet);

            // var_dump($response);
            if (!is_null($response))            
                return $response;
            else
                show_404();

        }
    }
?>