<?php
    class Login extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        $data['title'] = 'Login';

        public function index()
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('login_view');
            $this->load->view('templates/footer');
        }
    }
?>