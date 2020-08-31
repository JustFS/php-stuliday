<section>
	<div class="container">
		<div class="row">
			<?php if (isset($message)) {
				echo "<p> " . $message . " </p>";
			} ?>
			<div class="col 6 6">
				<h2>Se connecter</h2>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-group col 6 6">
					<div>
						<label for="exampleInputEmail1">Adresse e-mail</label>
						<input type="text" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail...">
						<small id="emailHelp" class="form-text text-muted">Votre email ne sera jamais commercialisé.</small>
					</div>
					<div class="form-group col-md-10">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe...">
					</div>
					<button type="submit" name="submit-login" class="btn cyan accent-3 col-md-4 offset-3">Connexion</button>
				</form>
			</div>
<br/>
			<div class="col 6 6">
				<h2>S'inscrire</h2>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="form-group col-md-10">
						<label for="exampleInputEmail2">Adresse e-mail</label>
						<input type="text" name="user_email_signup" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Entrez votre mail...">
						<small id="emailHelp" class="form-text text-muted">Votre email ne sera jamais commercialisé.</small>
					</div>
					<div class="form-group col-md-10">
						<label for="exampleInputPassword2">Select a Password</label>
						<input type="password" name="user_password_signup" class="form-control" id="exampleInputPassword2" placeholder="Entrez votre mot de passe...">
					</div>
					<div class="form-group col-md-10">
						<label for="exampleInputPassword3">Re-type your Password</label>
						<input type="password" name="user_password_2_signup" class="form-control" id="exampleInputPassword3" placeholder="Password">
					</div>
					<button type="submit" name="submit-signup" class="btn cyan accent-3 col-md-4 offset-3">Inscription</button>
				</form>
			</div>
		</div>
	</div>
</section>