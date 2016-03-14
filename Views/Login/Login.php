<div id="formBox">
	<ul id="errorBox" style="display: <?php echo $displayErrorBox ? 'block' : 'none' ?>" >
		<?php 
			foreach ($this->errorList as $error) { ?>
			<li><?php echo $error; ?></li>
		<?php
			}
		?>
	</ul>
	<form id="loginForm" method="POST" action="<?php echo BASE_DIR ?>/Login/Submit">
		<p>
			<label for="login">Login : </label><input type="text" id="login" name="login"/>
		</p>
		<p>
			<label for="password">Mot de passe : </label><input type="password" id="password" name="password"/>
		</p>
		<input type="submit" value="Valider" />
	</form>
</div>