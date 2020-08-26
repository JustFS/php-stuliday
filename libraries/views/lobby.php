<?php

require('templates/header.php');
require('templates/nav.php');
?>

<section>
	<img class="" src="assets/img/main-bg.jpg">
	<div class="container main center-align">
		<div class="row">
			<div class="col s12 m12">
				<div class="card cyan accent-3 center-align">
					<div class="card-content white-text text-center">
						<h1 class="">Bienvenue sur Stuliday !</h1>
						<div class="card-action">
							<?php 
								if (empty($_SESSION)): ?> <p class="lead"> <br> <a href='libraries/views/login.php'> Connectez-vous </a>ou<a href='libraries/views/login.php'> Inscrivez-vous</a></p> <?php 
								else: ?>
									<a href="libraries/views/create-annonce.php">
										<div class="btn blue lighten-1 container">
											Créer une annonce
										</div>
									</a>
								<?php 
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require('templates/footer.php'); ?>