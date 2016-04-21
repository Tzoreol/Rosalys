<?php

class Contact extends Controller
{

    function __construct()
    {
        array_push($this->_js, "contact");
    }


    function init() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Contact/Contact.php");
    }
}