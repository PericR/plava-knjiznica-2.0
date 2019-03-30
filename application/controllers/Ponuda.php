<?php
    class Ponuda extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function index()
        {

            if(!isset($this->session->uloga_korisnika))
            {
                $this->session->uloga_korisnika = 'gost';
            }
            
            $this->load->helper('url');

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('ponuda_view');
            $this->load->view('templates/footer');
        }
    }
?>