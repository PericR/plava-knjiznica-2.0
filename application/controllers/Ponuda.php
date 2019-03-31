<?php
    class Ponuda extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('knjiga_model');
        }

        public function index()
        {

            if(!isset($this->session->uloga_korisnika))
            {
                $this->session->uloga_korisnika = 'gost';
            }
            
            $data['knjige'] = $this->knjiga_model->daj_sve();
            $data['test'] = 'neki test';

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('ponuda_view', $data);
            $this->load->view('templates/footer');
        }
    }
?>