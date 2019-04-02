<div class="row align-items-top h-100">
    <div class="col-md-6 offset-md-3">
        <hr>
        <h2>Unesite podatke o vašoj kartici</h2>
        <?php echo form_open('korisnik/dodaj_karticu'); ?>
            <div class="form-group">
                <label for="tip_kartice">Tip Kartice</label>
                <div class="input-group">
                    <select class="form-control" name="tip_kartice">
                        <option value="visa">Visa</option>
                        <option value="maestro">Maestro</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="american express">American Express</option>
                    </select>
                </div>                
            </div>

            <div class="form-group">
                <label for="broj_kartice">Broj Kartice</label>
                <div class="input-group">
                    <input class="form-control" type="number" name="broj_kartice">
                </div>
                <small class="text-danger"><?php echo form_error('broj_kartice'); ?></small>
            </div>
            <?php
                if(isset($zauzet_broj_kartice))
                {
                    print($zauzet_broj_kartice);
                }
            ?>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <div class="input-group">
                <input class="form-control" type="number" name="cvv">
                </div>
                <small class="text-danger"><?php echo form_error('cvv'); ?></small>
            </div>

            <div class="form-group">
                <label for="expire_date">Kartica vrijedi do</label>
                <div class="input-group">
                    <input class="form-control" type="date" name="expire_date">
                </div>
                <small class="text-danger"><?php echo form_error('expire_date'); ?></small>
            </div>

            <button class="btn btn-primary" type="submit" name="dodaj_karticu">				
				Dodaj Karticu
			</button>
        </form>
        <hr>
    </div>

</div>