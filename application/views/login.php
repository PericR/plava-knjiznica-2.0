<div class="row align-items-center h-100">
	<div class="col-md-6 offset-md-3">
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link active rounded-0" id="navLinkPrijava" href="?view=login">Prijava</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?view=register">Registracija</a>
			</li>
		</ul>
		<form method="POST" action="controllers/login.php">
			<div class="form-group">
				<label for="korisnicko_ime">Korisničko ime</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fas fa-user-tie"></i>
						</span>
					</div>
					<input type="text" name="korisnicko_ime" class="form-control" placeholder="Korisničko Ime?" />					
				</div>
				<?php
            		if(isset($_SESSION['nepostojeci_korisnik'])){
						print($_SESSION['nepostojeci_korisnik']);
						unset($_SESSION['nepostojeci_korisnik']);
            		}
                ?>
			</div>
			<div class="form-group">
				<label for="lozinka">Lozinka:</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fas fa-key"></i>
						</span>
					</div>
					<input type="password" name="lozinka" class="form-control" placeholder="Vaša Lozinka" />					
				</div>
			</div>
			<button class="btn btn-primary" type="submit" name="prijava">
				<i class="fas fa-sign-in-alt"></i>
				Prijavite se
			</button>
		</form>
	</div>
</div>