<?php
    session_start();

    define("CONTROLLERS_DIR", "Controllers");
    define("DIR_SEPARATOR", "/");
    define("PHP_CLASS_EXTENSION", ".class.php");
    define("BASE_DIR", "/Rosalys");

    require_once(dirname(__FILE__) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller" .PHP_CLASS_EXTENSION);

    if(isset($_GET['controller'])) {

        $controller = $_GET['controller'];

        //Call init function if no action defined
        $action = isset($_GET['action']) ? $_GET['action'] : "init";

        if(require(dirname(__FILE__) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. $controller .DIR_SEPARATOR. $controller .PHP_CLASS_EXTENSION)) {
            $controllerClass = new $controller();
            $controllerClass->setPageName($controller);

            if(method_exists($controllerClass, $action)) {
                $controllerClass->addLayout($action);
            }
        }
    }
?>