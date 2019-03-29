<?php
    class Korisnik extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('korisnik_model');         
            $this->load->helper('url');   
        }        
        
        public function login()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');



            $data['title'] = 'Login';
            $data['uloga_korisnika'] = 'gost';

            $this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required');
            $this->form_validation->set_rules('lozinka', 'Lozinka', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('login_view');
                $this->load->view('templates/footer');
            }
            else
            {                
                $data['korisnik'] = $this->korisnik_model->login();

                if(empty($data['korisnik']))
                {
                    show_404();
                }
                
                $data['ime'] = $data['korisnik']['ime'];
                $data['prezime'] = $data['korisnik']['prezime'];      
                $data['uloga_korisnika'] = $data['korisnik']['uloga_korisnika'];  
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('ponuda_view', $data);
                $this->load->view('templates/footer');

            }
        }
        
        
    }
?>