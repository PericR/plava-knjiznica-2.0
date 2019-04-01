<?php
    class Korisnik extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('korisnik_model');     
            $this->load->model('narudzba_model');
            $this->load->model('knjiga_model');
        }        
        
        public function login()
        {
            $this->form_validation->set_rules('korisnicko_ime', 'Korisničko ime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('lozinka', 'Lozinka', 'trim|required|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {
                if(isset($this->session->id))
                {   //sprjecavamo pristup loginu nakon logina
                    redirect('ponuda/index');
                }

                //loadamo view zbog prikaza greske u formi
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('login_view');
                $this->load->view('templates/footer');
            }
            else
            {                
                $data['korisnik'] = $this->korisnik_model->login($this->input->post('korisnicko_ime'), $this->input->post('lozinka'));

                if(empty($data['korisnik']))//provjera lozinke i korisnickog imena
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

                    redirect('ponuda/index');
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
                if(isset($this->session->id))
                {   //sprjecavamo pristup register stranici nakon logina
                    redirect('ponuda/index');
                }

                //loadamo view zbog prikaza greske u formi
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view');
                $this->load->view('templates/footer');
            }
            else if( $this->input->post('lozinka') !== $this->input->post('ponovljena_lozinka'))
            {
                $data['nepodudarajuce_lozinke'] = '<small class="text-danger">lozinke se ne poklapaju!</small>';
                //provjera lozinki
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view', $data);
                $this->load->view('templates/footer');
            }
            else if($this->korisnik_model->provjeri_korisnicko_ime($this->input->post('korisnicko_ime')))
            {
                $data['zauzeto_korisnicko_ime'] = '<small class="text-danger">Korisničko ime je zauzeto!</small>';
                //provjera korisnickog imena
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('register_view', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->korisnik_model->register();
                
                $data['korisnik'] = $this->korisnik_model->login($this->input->post('korisnicko_ime'), $this->input->post('lozinka'));//omogucavamo trenutni login ako je uspjesna registracija

                //postavljanje sesije kako bi se automatski obavio login pri registraciji
                $this->session->ime = $data['korisnik']['ime'];
                $this->session->prezime = $data['korisnik']['prezime'];
                $this->session->korisnicko_ime = $data['korisnik']['korisnicko_ime'];
                $this->session->id = $data['korisnik']['id'];
                $this->session->uloga_korisnika = $data['korisnik']['uloga_korisnika'];

                redirect('ponuda/index');
            }
        }
        public function dodaj_karticu()
        {
            $this->form_validation->set_rules('broj_kartice', 'Broj Kartice', 'trim|required|min_length[16]');
            $this->form_validation->set_rules('expire_date', 'Vrijedi do', 'required');
            $this->form_validation->set_rules('cvv','CVV','trim|required|min_length[3]|max_length[3]');

            if($this->form_validation->run() == FALSE)
            {   
                //loadamo view zbog prikaza greske u formi
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('kartica_view');
                $this->load->view('templates/footer');
            }
            else if($this->korisnik_model->provjeri_broj_kartice($this->input->post('broj_kartice')))
            {
                $data['zauzet_broj_kartice'] = '<small class="text-danger">Kartica sa tim brojem je već dodana</small>';
                //provjera broja kartice
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('kartica_view', $data);
                $this->load->view('templates/footer');

            }
            else
            {
                $this->korisnik_model->dodaj_karticu($this->session->id, $this->input->post('broj_kartice'),  $this->input->post('tip_kartice'), $this->input->post('expire_date'), $this->input->post('cvv'));
                redirect('ponuda/index');
            }
        }

        public function odjava()
        {
            $this->session->sess_destroy();
            
            redirect('ponuda/index');
        }

        public function potvrdite_brisanje()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('potvrdi_brisanje_korisnika');
            $this->load->view('templates/footer');

        }

        public function obrisi_racun()
        {

            $this->korisnik_model->obrisi($this->session->id);
            $this->session->sess_destroy();

            redirect('ponuda/index');
        }

        public function kupovina($id_knjige)
        {
            
            if ($this->session->uloga_korisnika == 'gost') 
            {
                redirect('korisnik/login');                
            }

            $broj_kartice = $this->korisnik_model->provjeri_id_kartice($this->session->id);

            if($broj_kartice == FALSE)
            {
                redirect('korisnik/dodaj_karticu');            
            }
            else
            {
                $knjiga = $this->knjiga_model->daj_knjigu($id_knjige);
                $ime_knjige = $knjiga['naziv'];
                $ime_kupca = $this->session->ime.' '.$this->session->prezime;

                $this->narudzba_model->napravi_narudzbu($id_knjige, $this->session->id, $broj_kartice, $ime_knjige, $ime_kupca);            
                redirect('korisnik/narudzbe');            
            }
        }

        public function narudzbe()
        {
            $data['narudzbe'] = $this->narudzba_model->daj_narudzbe($this->session->id);

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('narudzbe_view', $data);
            $this->load->view('templates/footer');
        }
    }
?>