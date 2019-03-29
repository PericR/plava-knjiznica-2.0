<?php
    class Home extends CI_Controller
    {
        public function view($page='ponuda')
        {
            if(!file_exists(APPPATH.'views/'.$page.'.php'))
            {
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['uloga_korisnika'] = 'gost';

            $data['ime'] = 'robert';
            $data['prezime']= 'perić';
            $this->load->helper('url');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view($page, $data);
            $this->load->view('templates/footer');
        }
    }
?>