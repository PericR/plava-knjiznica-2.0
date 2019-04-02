<?php
    class Knjiga extends CI_Controller
    {
        function __construct()    
        {
            parent::__construct();
            $this->load->model('knjiga_model');    
            $this->load->model('autor_model');     
        }

        public function knjige()
        {
            $data['autori'] = $this->autor_model->daj_sve();
            $data['knjige'] = $this->knjiga_model->daj_sve();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('knjiga_view', $data);
            $this->load->view('templates/footer');    
        }

        public function dodaj_knjigu()
        {            
            $this->form_validation->set_rules('naziv', 'Naziv', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('cijena', 'Cijena', 'trim|required|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {
                $data['autori'] = $this->autor_model->daj_sve();
                //loadamo view zbog prikaza greske u formi
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view', $data);
                $this->load->view('templates/footer');    
            }
            else
            {
                $ime_autora = $this->autor_model->daj_autora($this->input->post('autor_id'));
                $ime_autora = $ime_autora['ime'].' '.$ime_autora['prezime'];
                $this->knjiga_model->dodaj_knjigu($this->input->post('autor_id'), $this->input->post('naziv'), $ime_autora, $this->input->post('cijena'));

                redirect('knjiga/knjige');
            }
        }

        public function dodaj_autora()
        {
            $this->form_validation->set_rules('ime', 'Ime', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|max_length[32]');

            if($this->form_validation->run() == FALSE)
            {                
                $data['autori'] = $this->autor_model->daj_sve();
                //loadamo view zbog prikaza greske u formi
                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('knjiga_view', $data);
                $this->load->view('templates/footer');    
            }
            else
            {
                $this->autor_model->dodaj_autora($this->input->post('ime'), $this->input->post('prezime'));

                redirect('knjiga/knjige');
            }
        }

        public function postavite_dostupnost($dostupnost)
        {
            $this->knjiga_model->postavi_dostupnost($dostupnost, $this->input->post('knjige'));
            redirect('knjiga/knjige');
        }
    }
?>