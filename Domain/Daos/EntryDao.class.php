<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/Entry.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/EntryType.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/EntryTypeType.class.php";

class EntryDao
{
    public function findAll() {
        $query = "SELECT * FROM `ENTRY`";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "Entry");
    }

    public function findMonthCashing() {
        $query = "SELECT SUM(`amount`) AS monthCashing FROM `entry` e INNER JOIN `entry_type` et ON e.`entryType`= et.`idEntryType`WHERE et.`entryTypeType`= 1";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();
        $result = $statement->fetchColumn();

        return isset($result) ? $result : 0;
    }

    public function findMonthWithdrawal() {
        $query = "SELECT SUM(`amount`) AS monthWithdrawal FROM `entry` e INNER JOIN `entry_type` et ON e.`entryType`= et.`idEntryType`WHERE et.`entryTypeType`= 2";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();
        $result = $statement->fetchColumn();

        return isset($result) ? $result : 0;
    }

    public function insertEntry($label, $entryType, $amount) {
        $query = "INSERT INTO `entry`(`date`, `entryType`, `label`, `amount`) VALUES(:now, :entryType, :label, :amount)";
        $statement = Controller::getPDO()->prepare($query);

        $date = date('Y-m-d');

        $statement->bindParam(':now',$date );
        $statement->bindParam(':label', $label);
        $statement->bindParam(':entryType', $entryType);
        $statement->bindParam(':amount', $amount);

        $statement->execute();
    }

    public function findLast30() {
        $query =  "SELECT * FROM `ENTRY` ORDER BY `date` DESC, `idEntry` DESC LIMIT 0,30";

        $statement = Controller::getPDO()->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Entry');
    }

    public function updatePointed($id, $pointed) {
        $query = "UPDATE `entry` SET `pointed` = :pointed WHERE `idEntry` = :id";

        $statement = Controller::getPDO()->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':pointed', $pointed);

        $statement->execute();
    }

    public function findActualMonthTurnover() {
        $query = "SELECT SUM(`amount`) FROM `entry` WHERE `date` BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND LAST_DAY(NOW()) AND (`entryType` = 1 OR `entryType`= 2)";

        $statement = Controller::getPDO()->prepare($query);
        $statement->execute();

        return $statement->fetchColumn();
    }
}