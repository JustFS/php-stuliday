<?php
$page = 'login';
require('../models/connect.php');
require('templates/header.php');
include('templates/nav.php');


$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';


// SIGNUP
if (isset($_POST['submit-signup'])) {
	$user_email = htmlspecialchars($_POST['user_email_signup']);
	$user_pass = htmlspecialchars($_POST['user_password_signup']);
	$user_pass2 = htmlspecialchars($_POST['user_password_2_signup']);

	if ($sql = $db->query("SELECT * FROM users WHERE email = '$user_email'")) {
		$counter = $sql->rowCount();

		if ($counter != 0) {
			$message = "<div class='alert alert-danger'>Il y a déjà un compte possédant cette email</div>";
		} elseif (!empty($user_email) && (!empty($user_pass))) {
			if ($user_pass == $user_pass2) {
				$user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
				$sth = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");

				$sth->bindValue(':email', $user_email);
				$sth->bindValue(':password', $user_pass);

				if ($sth->execute()) {
					$message = "<div class='green'>Votre compte a bien été créé</div>";
				}
			} else {
				$message = "<div class='red'>Les mots de passe de concordent pas</div>";
			}
		} else {
			$message = "<div class='red'>Veuillez bien remplir les champs</div>";
		}
	} else {
		$message = "<div class='red'>Une erreur vient de se produire veuillez rééssayer.</div>";
	}

	// SIGNIN
} elseif (isset($_POST['submit-login'])) {
	$user_email = htmlspecialchars($_POST['user_email']);
	$user_pass = htmlspecialchars($_POST['user_password']);
	$sql = $db->query("SELECT * FROM users WHERE email = '$user_email'");

	if ($user = $sql->fetch()){
			$db_id = $user['id'];
			$db_email = $user['email'];
			$db_pass = $user['password'];
		
		if (password_verify($user_pass, $db_pass)){
			$_SESSION['id'] = $db_id;
			$_SESSION['email'] = $db_email;

      $message = "<div class='blue'>Vous êtes connecté</div>";
      header('Location: ../../index.php');

		} else {
			$message = "<div class='red'>Identifiants non reconnus.</div>";
		}
	} else {
		$message = "<div class='red'>Identifiants inconnus.</div>";
	}
}


?>
<section>
	<div class="container">
		<div class="row">
			<?php if (isset($message)) {
				echo "<p> " . $message . " </p>";
			} ?>
			<div class="col 6 6">
				<h2>Se connecter</h2>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-group col 6 6">
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

<?php
require('templates/footer.php');
?>