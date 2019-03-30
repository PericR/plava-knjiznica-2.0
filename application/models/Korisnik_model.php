<?php
    class Korisnik_model extends CI_Model
    {
        public function __construct()
        {            
            $this->load->database();
        }

        public function login($korisnicko_ime, $lozinka)
        {
            $query = $this->db->get_where('korisnik', array('korisnicko_ime'=>$korisnicko_ime, 'lozinka'=>$lozinka), 1);
            return $query->row_array();
        }

        public function register()
        {
            $data = array(
                'id'=> null,
                'ime' => $this->input->post('ime'),
                'prezime' => $this->input->post('prezime'),
                'korisnicko_ime' => $this->input->post('korisnicko_ime'),
                'lozinka' => $this->input->post('lozinka'),
            );

            return $this->db->insert('korisnik', $data);
        }

        public function provjeri_korisnicko_ime($korisnicko_ime)
        {
            $query = $this->db->get_where('korisnik', array('korisnicko_ime' => $korisnicko_ime), 1);
            $data = $query->row_array();

            if(empty($data))
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }            
        }

        public function dodaj_karticu($id_korisnika, $broj_kartice, $tip_kartice, $expire_date, $cvv)
        {
            $data = array(
                'id_korisnika' => $id_korisnika,
                'broj_kartice' => $broj_kartice,
                'tip_kartice' => $tip_kartice,
                'expire_date' => $expire_date,
                'cvv' => $cvv
            );

            return $this->db->insert('bankovna_kartica', $data);
        }

        public function provjeri_broj_kartice($broj_kartice)
        {
            $query = $this->db->get_where('bankovna_kartica', array('broj_kartice' => $broj_kartice), 1);
            $data = $query->row_array();

            if(empty($data))
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }            
        }
    }
?>