<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/EntryType.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/EntryTypeType.class.php";

class EntryTypeDao
{
    public function findAll() {
        $query = "SELECT * FROM `ENTRY_TYPE`";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "EntryType");
    }

    public function findLabelById($id) {
        $query = "SELECT `label` FROM `entry_type` WHERE `idEntryType` = :id";
        $statement = Controller::getPDO()->prepare($query);

        $statement->bindParam(":id", $id);
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function findEntryTypeTypeById($id) {
        $query = "SELECT ett.`label`FROM `entry_type`et INNER JOIN `entry_type_type` ett ON et.`entryTypeType` = ett.`idEntryTypeType` WHERE et.`idEntryType`= :id";
        $statement = Controller::getPDO()->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetchColumn();
    }
}