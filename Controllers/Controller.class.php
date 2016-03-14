<?php

class Controller
{
    protected $_css = array("main");
    protected $_js = array("");
    protected $pageName;

    function addLayout($action) {
        include_once(dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Views" .DIR_SEPARATOR. "Layout.php");
    }

    function addHeader() {
        include_once(dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Views" .DIR_SEPARATOR. "Header.php");
    }

    public static function getPDO() {
        if(file_exists(dirname(dirname(__FILE__)). "/config/settings.ini")) {
            $settings = parse_ini_file(dirname(dirname(__FILE__)) . "/config/settings.ini", true);

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=' . $settings['database']['bdd_name'] . ';charset=utf8', $settings['database']['bdd_username'], $settings['database']['bdd_password']);
                return $bdd;
            } catch (PDOException $e) {
                echo "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        return false;
    }

    function isUserLogged() {
        if(isset($_SESSION['logged'])) {
            return $_SESSION['logged'];
        }

        return false;
    }

    function setPageName($pageName) {
        $this->pageName = $pageName;
    }

    function isActive($element) {
        return strtolower($this->pageName) == $element ? "active" : "";
    }
}