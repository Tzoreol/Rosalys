<?php

class Compositions extends Controller
{

    function __construct() {
       array_push($this->_css,"compositions"); 
       array_push($this->_js, "compositions");
       $this->hasSubNav = true;
    }
    
    function init() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Compositions/Compositions.php");
    }
    
    function includeSubNav() {
        include(dirname(dirname(dirname(__FILE__))) . "/Views/Compositions/CompositionsSubNav.php");
    }
}