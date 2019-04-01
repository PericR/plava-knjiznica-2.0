<h1>
    TRENUTNA PONUDA NAŠIH KNJIGA
    <?php //session test
        /*echo $this->session->ime.' ';
        echo $this->session->prezime.' ';   
        echo $this->session->korisnicko_ime.' ';
        echo $this->session->lozinka.' ';
        echo $this->session->id.' ';
        echo $this->session->uloga_korisnika;*/
    ?>
</h1>

    <div id="prikazPonudeKnjiga">
        <ul class="list-unstyled">
            <li v-for="knjiga in knjige" class="media">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{{knjiga.knjiga.naziv}}</h5>
                    Autor: {{knjiga.knjiga.autor}} cijena: {{knjiga.knjiga.cijena}}
                    <br>
                    <a :href="knjiga.knjiga.link">
                        <button class="btn btn-primary">Kupi me</button>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <script>
        new Vue({
            el: '#prikazPonudeKnjiga',
            data:{
                knjige: [//punimo podatcima koje smo dobili od controllera
                    <?php
                        foreach($knjige as $knjiga){
                            $knjiga_data = '{knjiga: {id: '.$knjiga['id'].', autor: "'.$knjiga['ime_autora'].'", naziv: "'.$knjiga['naziv'].'", cijena: '.$knjiga['cijena'].', link: "'.base_url().'index.php/korisnik/kupovina/'.$knjiga['id'].'"}},';
                            echo $knjiga_data;
                        }
                    ?>
                ]
            }
        })
    </script>

