<?php
    class Autor_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();
        }

        public function daj_sve()
        {
            $query = $this->db->get('autor');

            return $query->row_array();
        }
    }
?>