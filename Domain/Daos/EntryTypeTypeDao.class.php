<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/EntryTypeType.class.php";

class EntryTypeTypeDao
{
    public function findAll() {
        $query = "SELECT * FROM `ENTRY_TYPE_TYPE`";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "EntryTypeType");
    }

    public function findByEntryType($idEntryType) {

        $query = "SELECT ett.`label`FROM `entry_type`et INNER JOIN `entry_type_type`ett ON et.`entryTypeType` = ett.`idEntryTypeType` WHERE et.`idEntryType`= :idEntryType";
        $statement = Controller::getPDO()->prepare($query);

        $statement->bindParam(':idEntryType', $idEntryType);
        $statement->execute();

        return $statement->fetchColumn();
    }
}