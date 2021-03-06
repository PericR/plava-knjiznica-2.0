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

        public function obrisi($id_korisnika)
        {
            $this->db->delete('bankovna_kartica', array('id_korisnika' => $id_korisnika));
            $this->db->delete('korisnik', array('id' => $id_korisnika), 1);
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

        public function provjeri_id_kartice($id_korisnika)
        {
            $query = $this->db->get_where('bankovna_kartica', array('id_korisnika' => $id_korisnika), 1);
            $data = $query->row_array();

            if(empty($data))
            {
                return FALSE;
            }
            else
            {
                return $data['broj_kartice'];
            }            
        }

        public function daj_sve_korisnike()
        {
            $query = $this->db->get('korisnik');

            return $query->result_array();
        }

        public function postavi_adminom($id)
        {
            $data = array(
                'uloga_korisnika' => 'admin'
            );

            $this->db->where('id', $id);
            $this->db->update('korisnik', $data);
        }
    }
?>