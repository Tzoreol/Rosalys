<?php

class Home extends Controller
{

    function __construct() {
        array_push($this->_js, "show");
    }
    
    function init() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Home/Home.php");
    }
}