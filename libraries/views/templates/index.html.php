<section>
	<img class="main-img" src="assets/img/main-bg.jpg" style="position: absolute; z-index: -1; height: 100vh !important; width: 100%; object-fit: cover; margin-top: -43px;">
	<div class="container main center-align">
		<div class="row">
			<div class="col s12 m12">
				<div class="card cyan accent-3 center-align" style="margin-top: 6rem">
					<div class="card-content white-text text-center">
						<h1 class="">Bienvenue sur Stuliday</h1>
						<div class="card-action">
							<?php 
								if (empty($_SESSION)): ?> <p class="lead"> <br> <a href='libraries/views/login.php' style="font-weight: bold; color: #6c6b6a; margin: 0 1.5rem">Connectez-vous </a>ou<a href='libraries/views/login.php' style="font-weight: bold; color: #6c6b6a; margin: 0 1.5rem"> Inscrivez-vous</a></p> <?php 
                else: ?>
                <br/>
									<a href="libraries/views/createAnnonce.php">
										<div class="btn blue lighten-1 container">
											Créer une annonce
										</div>
                  </a>
                  <br/>
                  <br/>
                  <a href="libraries/views/annonces.php">
										<div class="btn blue lighten-1 container">
											Consulter les annonces
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