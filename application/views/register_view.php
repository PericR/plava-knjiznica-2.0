<div class="row">
    <div class="col-md-6 offset-md-3">
        <hr>
        <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
				<?php
					echo anchor('korisnik/login', 'Prijavite se', array('class'=>'nav-link'));
				?>
			</li>
			<li class="nav-item">
				<?php
					echo anchor('korisnik/register', 'Registrirajte se', array('class'=>'nav-link active'));
				?>
			</li>
        </ul>
        <?php echo form_open('korisnik/register'); ?>
            <div class="form-group">
                <label for="ime">Vaše Ime</label>
                <input type="text" class="form-control" name="ime" placeholder="Unesite Vaše Ime" required>
            </div>
            <div class="form-group">
                <label for="prezime">Vaše Prezime</label>
                <input type="text" class="form-control" name="prezime" placeholder="Unesite Vaše Prezime" required>
            </div>
            <div class="form-group">
                <label for="korisnicko_ime">Vaše Korisničko Ime</label>
                <input type="text" class="form-control" name="korisnicko_ime" placeholder="Korisničko Ime" required>
                
                <?php
                if(isset($zauzeto_korisnicko_ime)){
                    print($zauzeto_korisnicko_ime);
                }
                ?>
            </div>
            <div class="form-group">
                <label for="lozinka">Lozinka</label>
                <input type="password" class="form-control" name="lozinka" placeholder="Unesite Vašu Lozinku" required>
            </div>
            <div class="form-group">
                <label for="ponovljena_lozinka">Ponovite Lozinku</label>
                <input type="password" class="form-control" name="ponovljena_lozinka" placeholder="Ponovite Vašu Lozinku" required>

                <?php
                if(isset($nepodudarajuce_lozinke)){
                    print($nepodudarajuce_lozinke);
                }
                ?>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="registracija">
                    <i class="fas fa-sign-in-alt"></i>
                    Registrirajte se
                </button>
            </div>
        </form>
    </div>
</div>