<?php

ini_set('sendmail_from', 'contact@rosalys.fr');
mail($_POST['receiver'], $_POST['subject'], $_POST['message']);
