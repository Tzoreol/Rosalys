<?php

class Infos extends Controller
{
	
function __construct()
    {
        array_push($this->_js, 'map');
	array_push($this->_css, 'map');
    }


    function init() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Infos/Infos.php");
    }
}
