<div class="row">
    <div class="col-md-6 offset-md-3">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="?view=login">Prijava</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?view=register">Registracija</a>
            </li>
        </ul>
        <form method="POST" action="controllers/register.php">
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
                if(isset($_SESSION['zauzeto_korisnicko_ime'])){
                    print($_SESSION['zauzeto_korisnicko_ime']);
                    unset($_SESSION['zauzeto_korisnicko_ime']);
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
                if(isset($_SESSION['nepoklapajuce_lozinke'])){
                    print($_SESSION['nepoklapajuce_lozinke']);
                    unset($_SESSION['nepoklapajuce_lozinke']);
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