<?php
    class Korisnik_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function login()
        {
            $query = $this->db->get_where('korisnik', array('korisnicko_ime'=>$this->input->post('korisnicko_ime'), 'lozinka'=>$this->input->post('lozinka')), 1);
            return $query->row_array();
        }
    }
?>