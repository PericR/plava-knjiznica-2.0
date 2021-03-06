<?php
    class Ponuda extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('knjiga_model');
            $this->load->model('autor_model');
        }

        public function index()
        {

            if(!isset($this->session->uloga_korisnika))
            {
                $this->session->uloga_korisnika = 'gost';
            }
            
            $data['knjige'] = $this->knjiga_model->daj_sve_dostupne();            

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('ponuda_view', $data);
            $this->load->view('templates/footer');
        }
    }
?>