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
            $query = $this->db->get_where('korisnik',array('korisnicko_ime' => $korisnicko_ime), 1);
            if(empty($query))
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