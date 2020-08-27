<?php

$page = 'annonce';
require('../models/connect.php');
require('../models/annonces.php');
require('templates/header.php');
include('templates/nav.php');

?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Liste des annonces</h2>
			</div>
		</div>
		<div class="row">
      <?php
        displayAnnonces();
			?>
		</div>
  </div>
</section>
<?php require('templates/footer.php'); ?>