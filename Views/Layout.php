<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		foreach($this->_css as $css) { ?>
			<link rel="stylesheet" href="<?php echo BASE_DIR ?>/styles/css/<?php echo $css; ?>.css" />
	<?php
		}

	?>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<script defer src="https://code.getmdl.io/1.1.2/material.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<?php
		foreach($this->_js as $js) { ?>
			<script src="<?php echo BASE_DIR ?>/scripts/js/<?php echo $js; ?>.js"></script>
			<?php
		}
	?>
	</head>
	<body>
		<header class="mdl-layout__header">
			<?php $this->addHeader(); ?>
		</header>
		<main class="<?php echo $this->hasSubNav() ? 'down' : 'normal' ?>">
			<?php $this->$action(); ?>
		</main>
	</body>
</html>