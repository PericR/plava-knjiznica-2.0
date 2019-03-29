<?php
    class Ponuda extends CI_Controller
    {
        public function view($page='ponuda')
        {
            if(!file_exists(APPPATH.'views/'.$page.'.php'))
            {
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/footer');
        }
    }
?>