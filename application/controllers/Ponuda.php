<?php
    class Ponuda extends CI_Controller
    {
        public function index()
        {

            $data['uloga_korisnika'] = 'gost';

            $this->load->helper('url');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('ponuda_view', $data);
            $this->load->view('templates/footer');
        }
    }
?>