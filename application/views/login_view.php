<div class="row align-items-center h-100">
	<div class="col-md-6 offset-md-3">
		<hr>
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<?php
					echo anchor('korisnik/login', 'Prijavite se', array('class'=>'nav-link active'));
				?>
			</li>
			<li class="nav-item">
				<?php
					echo anchor('korisnik/register', 'Registrirajte se', array('class'=>'nav-link'));
				?>
			</li>
		</ul>
		<?php echo form_open('korisnik/login'); ?>
			<div class="form-group">
				<label for="korisnicko_ime">Korisničko ime</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fas fa-user-tie"></i>
						</span>
					</div>
					<input type="text" name="korisnicko_ime" class="form-control" placeholder="Korisničko Ime?" required>					
				</div>
				<?php
            		if(isset($nepostojeci_korisnik)){
						print($nepostojeci_korisnik);
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
					<input type="password" name="lozinka" class="form-control" placeholder="Vaša Lozinka" required>					
				</div>
			</div>
			<button class="btn btn-primary" type="submit" name="prijava">
				<i class="fas fa-sign-in-alt"></i>
				Prijavite se
			</button>
		</form>
	</div>
</div>