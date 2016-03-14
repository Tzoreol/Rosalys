<?php

require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/OutstandingDao.class.php");

class AddOutstanding extends Controller
{
    function __construct()
    {
        array_push($this->_js, 'addOutstanding');
    }

    function init() {
        if($this->isUserLogged()) {
            include(dirname(dirname(dirname(__FILE__))) . "/Views/AddOutstanding/AddOutstanding.php");
        } else {
            header('Location: ' .BASE_DIR);
        }
    }

    public function submit() {
        $outstandingDao = new OutstandingDao();

        $outstandingDao->insertOutstanding($_POST['supplierName'], $_POST['purchaseDate'], $_POST['limitDate'], $_POST['amount']);

        header('Location: ' .BASE_DIR. '/Dashboard');
    }
}