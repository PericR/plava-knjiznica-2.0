<div class="row align-items-center h-100">
    <div class="col-md-4 offset-md-1">
        <hr>
        <h2>Unesite podatke o autoru</h2>
        <form method="POST" action="controllers/dodaj_autora.php">
            <div class="form-group">
                <label for="ime">Ime Autora</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="ime">
                </div>                
            </div>
            <div class="form-group">
                <label for="Prezime">Prezime Autora</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="prezime">
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="dodaj_karticu">				
				Dodaj Autora
			</button>
        </form>
        <hr>
    </div>

    <div class="col-md-4 offset-md-1">
        <hr>
        <h2>Unesite podatke o Knjizi</h2>
        <form method="POST" action="controllers/dodaj_knjigu.php">
            <div class="form-group">
                <label for="naziv">Naziv Knjige</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="naziv">
                </div>                
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <div class="input-group">
                    <input class="form-control" type="number" name="cijena">
                </div>
            </div>
            <div class="form-group">
                <label for="image_path">Ime Slike</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="image_path">
                </div>                
            </div>

            <button class="btn btn-primary" type="submit" name="dodaj_karticu">				
				Dodaj Knjigu
			</button>
        </form>
        <hr>
    </div>
</div>