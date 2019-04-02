<div class="row align-items-center h-100">
    <div class ="col-md-6 offset-md-3" id="prikazKorisnika">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id Korisnika</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Korisnicko Ime</th>
                    <th scope="col">Postavi adminom</th>
                </tr>
            </thead>
        
            <tbody>
                <tr v-for="korisnik in korisnici">
                    <th scope="row">{{korisnik.korisnik.id}}</th>
                    <td>{{korisnik.korisnik.ime}}</td>
                    <td>{{korisnik.korisnik.prezime}}</td>
                    <td>{{korisnik.korisnik.korisnickoIme}}</td>
                    <td>
                        <a :href="korisnik.korisnik.link">
                            <button class="btn-sm btn-primary">admin</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    new Vue({
        el: '#prikazKorisnika',
        data:{
        korisnici: [//punimo podatcima koje smo dobili od controllera
            <?php
                foreach($korisnici as $korisnik){
                    $korisnik_data = '{korisnik: {id: '.$korisnik['id'].', ime: "'.$korisnik['ime'].'", prezime: "'.$korisnik['prezime'].'", korisnickoIme: "'.$korisnik['korisnicko_ime'].'", link: "'.base_url().'index.php/korisnik/postavi_adminom/'.$korisnik['id'].'"}},';
                    echo $korisnik_data;
                }
            ?>
        ]
        }
    })
</script>