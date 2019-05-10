<div class="row align-items-center h-100">
    <div class ="table-responsive" id="prikazNarudzbi">
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
                    <th scope="row">{{narudzba.id}}</th>
                    <td>{{narudzba.ime_knjige}}</td>
                    <td>{{narudzba.datum_narudzbe}}</td>
                    <td>{{narudzba.broj_kartice}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    new Vue({
        el:'#prikazNarudzbi',
        data(){
            return{
                narudzbe: null
            }
        },
        mounted(){
            axios
            .get('<?php echo base_url()?>index.php/korisnik/daj_narudzbe_json')
            .then(response => (this.narudzbe = response.data));
        }
    });
</script>