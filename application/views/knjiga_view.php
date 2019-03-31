<div class="row align-items-center h-100">
    <div class="col-md-4 offset-md-1">   
        <hr>     
        <h2>Unesite podatke o autoru</h2>
        <?php echo form_open('admin/dodaj_autora'); ?>

            <div class="form-group">
                <label for="ime">Ime Autora</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="ime">
                </div>                
                <small class="text-danger"> <?php echo form_error('ime'); ?> </small>
            </div>

            <div class="form-group">
                <label for="Prezime">Prezime Autora</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="prezime">
                </div>
                <small class="text-danger"> <?php echo form_error('prezime'); ?> </small>
            </div>

            <button class="btn btn-primary" type="submit" name="dodaj_autora">				
				Dodaj Autora
			</button>
        </form>
    </div>

    <div class="col-md-4 offset-md-1">        
        <hr>
        <h2>Unesite podatke o Knjizi</h2>
        <?php echo form_open('admin/dodaj_knjigu'); ?>

            <div class="form-group">
                <label for="naziv">Naziv Knjige</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="naziv">
                </div>                
                <small class="text-danger"> <?php echo form_error('naziv'); ?> </small>
            </div>

            <div class="form-group">
                <label for="cijena">Cijena</label>
                <div class="input-group">
                    <input class="form-control" type="number" name="cijena">
                </div>
                <small class="text-danger"> <?php echo form_error('cijena'); ?> </small>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <div class="input-group">
                    <select class="form-control" name="autor_id">
                        <?php
                            foreach($autori as $autor){
                                print('<option value="'.$autor['id'].'">'.$autor['ime'].' '.$autor['prezime'].'</option>');
                            }
                        ?>
                    </select>
                </div>                
            </div>

            <button class="btn btn-primary" type="submit" name="dodaj_knjigu">				
				Dodaj Knjigu
			</button>
        </form>
    </div>
</div>