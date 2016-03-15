<?php
echo file_put_contents(dirname(dirname(dirname(__FILE__))). "/config/zone1.conf", $_POST['coords']);