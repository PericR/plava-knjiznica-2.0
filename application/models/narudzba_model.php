<?php
    class Narudzba_model extends CI_Model
    {
        function __construct()
        {
            $this->load->database();
        }

        public function napravi_narudzbu($id_knjige, $id_korisnika, $broj_kartice, $ime_kupca)
        {            
            $data = array(
                'id' => null,
                'kupac_id' =>  $id_korisnika,
                'broj_kartice' => $broj_kartice,
                'knjiga_id' => $id_knjige,
                'datum_narudzbe' => date('Y-m-d H:i:s'),
                'ime_kupca' => $ime_kupca
            );

            return $this->db->insert('narudzba', $data);
        }

        public function daj_narudzbe($id_korisnika)
        {
            $query = $this->db->get_where('narudzbe', array('kupac_id' => $id_korisnika));
            return $query->result_array();
        }
    }
?>