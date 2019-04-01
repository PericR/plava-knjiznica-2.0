<br>
<div class= "row">
    <div class="col-md-6 offset-md-1">
        <h5>da li ste sigurni da želite obrisati račun?</h5> 
    </div>
</div>    
<div class="row">
    <div class="col-md-4 offset-md-1">
        <?php echo anchor('korisnik/obrisi_racun', 
            '<button class="btn btn-danger">
                Potvrdite brisanje
            </button>'); ?>        
    </div>
    
    <div class="col-md-4 offset-md-1">
        <?php echo anchor('ponuda/index', '
            <button class="btn btn-primary">
                Odustanite
            </button>'); ?>   
    </div>
</div>