<?php $title= 'S\'inscrire'; ?>

<?php ob_start(); ?>



<section id="registerDiv">

	<div id="imgregisterSlider">
		<img src="public/CSS/IMG/imgSlider.png">
	</div>

	
		<div id="textRegisterSlider">

			<div id="registerSpace">
				<div>
					<h1>Inscrivez- vous en 1 clic</h1>
				</div>

				<form method="post" action="index.php?action=addMember">
					<div id="registerId">
						<label for="pseudo">Pseudo</label><input type="text" id="pseudo" name="pseudo">
						<label for="mail">Adresse email</label><input type="text" id="mail" name="mail">
						<label for="password">Mot de passe</label><input type="password" id="password" name="password">
					</div>
					<div id="registerButton">
						<input type="submit" value="Créer un compte">
					</div>
				</form>
			</div>

		</div>
	</div>

</section>


<?php $content= ob_get_clean(); ?>

<?php require ('view/Backend/template2.php'); ?>