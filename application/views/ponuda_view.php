<h1>
    PRODAJA SE OČEKUJE USKORO GOSPODINE 
    <?php 
        echo $this->session->ime.' ';
        echo $this->session->prezime.' ';   
        echo $this->session->korisnicko_ime.' ';
        echo $this->session->lozinka.' ';
        echo $this->session->id.' ';
        echo $this->session->uloga_korisnika;
    ?>

    <?php   
        if(isset($knjige)){
            foreach($knjige as $knjiga){
                print('<p>'.$knjiga['id'].' '.$knjiga['naziv'].' '.$knjiga['cijena'].'</p>');
            }
        }
    ?>
</h1>