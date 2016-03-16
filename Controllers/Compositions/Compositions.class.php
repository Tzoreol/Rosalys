<?php

class Home extends Controller
{

    function init() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Home/Home.php");
    }
}