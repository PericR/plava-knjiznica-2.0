<?php
    class Admin extends CI_Controller
    {
        function __construct()    
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('knjiga_model');    
            $this->load->model('autor_model');     
            $this->load->helper('url');   
            $this->load->helper('form');
            $this->load->library('form_validation');
        }

        public function dodaj_knjigu()
        {
            $this->form_validation->set_rules('naziv', 'Naziv', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('cijena', 'Cijena', 'trim|required|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view');
                $this->load->view('templates/footer');    
            }
            else
            {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view');
                $this->load->view('templates/footer');    
            }
        }

        public function dodaj_autora()
        {
            $this->form_validation->set_rules('ime', 'Ime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {                
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view');
                $this->load->view('templates/footer');    
            }
            else
            {
                $this->autor_model->dodaj_autora($this->input->post('ime'), $this->input->post('prezime'));

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view');
                $this->load->view('templates/footer');
            }
        }
    }
?>