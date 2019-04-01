<?php
    class Knjiga_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();
        }

        public function dodaj_knjigu($autor_id, $naziv, $ime_autora, $cijena)
        {
            $data = array(
                'autor_id' => $autor_id,
                'naziv' => $naziv,
                'ime_autora' =>$ime_autora,
                'cijena' => $cijena
            );
    
            return $this->db->insert('knjiga', $data);
        }
    
        public function daj_sve()
        {
            $this->db->order_by('naziv ASC');
            $query = $this->db->get('knjiga');

            return $query->result_array();
        }    
    }
?>