<?php
    class Korisnik extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('korisnik_model');         
            $this->load->helper('url');   
            $this->load->helper('form');
            $this->load->library('form_validation');
        }        
        
        public function login()
        {
            $this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'required');
            $this->form_validation->set_rules('lozinka', 'Lozinka', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('login_view');
                $this->load->view('templates/footer');
            }
            else
            {                
                $data['korisnik'] = $this->korisnik_model->login($this->input->post('korisnicko_ime'), $this->input->post('lozinka'));

                if(empty($data['korisnik']))
                {
                    $data['nepostojeci_korisnik'] = '<small class="text-danger">Pogrešno korisničko ime ili lozinka!!</small>';
                    
                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('login_view', $data);
                    $this->load->view('templates/footer');    
                }
                else
                {
                    $this->session->ime = $data['korisnik']['ime'];
                    $this->session->prezime = $data['korisnik']['prezime'];
                    $this->session->korisnicko_ime = $data['korisnik']['korisnicko_ime'];
                    $this->session->id = $data['korisnik']['id'];
                    $this->session->uloga_korisnika = $data['korisnik']['uloga_korisnika'];

                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('ponuda_view');
                    $this->load->view('templates/footer');
                }
            }
        }
        
        public function register()
        {
            $this->form_validation->set_rules('ime', 'Ime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('korisnicko_ime', 'Korisničko Ime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('lozinka', 'Lozinka', 'trim|required|min_length[8]|max_length[32]');
            $this->form_validation->set_rules('ponovljena_lozinka', 'Ponovljena Lozinka', 'trim|required|min_length[8]|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view');
                $this->load->view('templates/footer');
            }
            else if( $this->input->post('lozinka') !== $this->input->post('ponovljena_lozinka'))
            {
                $data['nepodudarajuce_lozinke'] = '<small class="text-danger">lozinke se ne poklapaju!</small>';

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view', $data);
                $this->load->view('templates/footer');
            }
            else if($this->korisnik_model->provjeri_korisnicko_ime($this->input->post('korisnicko_ime')))
            {
                $data['zauzeto_korisnicko_ime'] = '<small class="text-danger">Korisničko ime je zauzeto!</small>';

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->korisnik_model->register();
                
                $data['korisnik'] = $this->korisnik_model->login($this->input->post('korisnicko_ime'), $this->input->post('lozinka'));//omogucavamo trenutni login ako je uspjesna registracija

                if(empty($data['korisnik']))
                {
                    show_404();
                }
                
                $this->session->ime = $data['korisnik']['ime'];
                $this->session->prezime = $data['korisnik']['prezime'];
                $this->session->korisnicko_ime = $data['korisnik']['korisnicko_ime'];
                $this->session->id = $data['korisnik']['id'];
                $this->session->uloga_korisnika = $data['korisnik']['uloga_korisnika'];

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('ponuda_view');
                $this->load->view('templates/footer');
            }
        }

        public function odjava()
        {
            $this->session->sess_destroy();
            $this->session->uloga_korisnika = 'gost';

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('ponuda_view');
            $this->load->view('templates/footer');
        }

        public function dodaj_karticu()
        {
            $this->form_validation->set_rules('broj_kartice', 'Broj Kartice', 'required');
        }

    }
?>