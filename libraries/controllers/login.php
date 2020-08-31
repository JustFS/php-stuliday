<?php

$login = new Login();

// SIGNUP
if (isset($_POST['submit-signup'])) {
	$user_email = htmlspecialchars($_POST['user_email_signup']);
	$user_pass = htmlspecialchars($_POST['user_password_signup']);
	$user_pass2 = htmlspecialchars($_POST['user_password_2_signup']);

  $counter = $login->countAlreadyExists($user_email);

		if ($counter != 0) {
			$message = "<div class='alert alert-danger'>Il y a déjà un compte possédant cette email</div>";
		} elseif (!empty($user_email) && (!empty($user_pass))) {
			if ($user_pass == $user_pass2) {

				$user_pass = password_hash($user_pass, PASSWORD_DEFAULT);
        
        $sth = $login->signUp();

				$sth->bindValue(':email', $user_email);
				$sth->bindValue(':password', $user_pass);

				if ($sth->execute()) {
					$message = "<h5 class='card green'>Votre compte a bien été créé</h5>";
        } else {
          $message = "<div class='card red'>Les mots de passe de concordent pas</div>";
        }
		} else {
			$message = "<div class='card red'>Veuillez bien remplir les champs</div>";
		}
	} else {
		$message = "<div class='card red'>Une erreur vient de se produire veuillez rééssayer.</div>";
	}

	// SIGNIN
} elseif (isset($_POST['submit-login'])) {
	$user_email = htmlspecialchars($_POST['user_email']);
  $user_pass = htmlspecialchars($_POST['user_password']);
  
  $sql = $login->signIn($user_email);

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
