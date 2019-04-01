<div class="row align-items-center h-100">
    <div class ="col-md-6 offset-md-3" id="prikazNarudzbi">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id Narudzbe</th>
                    <th scope="col">Ime Knjige</th>
                    <th scope="col">Datum Kupovine</th>
                    <th scope="col">Broj Kartice</th>
                </tr>
            </thead>
        
            <tbody>
                <tr v-for="narudzba in narudzbe">
                    <th scope="row">{{narudzba.narudzba.id}}</th>
                    <td>{{narudzba.narudzba.knjiga}}</td>
                    <td>{{narudzba.narudzba.datum}}</td>
                    <td>{{narudzba.narudzba.kartica}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    new Vue({
        el: '#prikazNarudzbi',
        data:{
        narudzbe: [//punimo podatcima koje smo dobili od controllera
            <?php
                foreach($narudzbe as $narudzba){
                    $narudzba_data = '{narudzba: {id: '.$narudzba['id'].', knjiga: "'.$narudzba['ime_knjige'].'", kartica: "'.$narudzba['broj_kartice'].'", datum: "'.$narudzba['datum_narudzbe'].'"}},';
                    echo $narudzba_data;
                }
            ?>
        ]
        }
    })
</script>