<?php

require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/EntryDao.class.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/EntryTypeDao.class.php");
class AddEntry extends Controller
{
    protected $entryTypes;
    protected $description;
    protected $type;

    function __construct()
    {
        array_push($this->_js, "addEntry");
    }

    public function init() {
        if($this->isUserLogged()) {

            $entryTypeDao = new EntryTypeDao();
            $this->entryTypes = $entryTypeDao->findAll();

            include(dirname(dirname(dirname(__FILE__))) . "/Views/AddEntry/AddEntry.php");
        } else {
            header('Location: ' .BASE_DIR);
        }
    }

    public function submit() {
        $entryDao = new EntryDao();

        $entryDao->insertEntry($_POST['label'], $_POST['entryType'], $_POST['amount']);

        header('Location: ' .BASE_DIR. '/Dashboard');
    }
}