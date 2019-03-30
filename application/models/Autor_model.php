<?php
    class Autor_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();
        }

        public function dodaj_autora($ime, $prezime)
        {
            $data = array(
                'ime' => $ime,
                'prezime' => $prezime
            );
            
            return $this->db->insert('autor', $data);
        }

        public function daj_sve()
        {
            $this->db->order_by('prezime ASC, ime ASC');
            $query = $this->db->get('autor');

            return $query->result_array();
        }
    }
?>