<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/Outstanding.class.php";

class OutstandingDao
{
    public function findAll() {
        $query = "SELECT * FROM `outstanding`";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "Outstanding");
    }

    public function findNotPaid() {
        $query = "SELECT * FROM `outstanding` WHERE `isPaid` = 0";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "Outstanding");
    }

    public function insertOutstanding($supplierName, $purchaseDate, $limitDate, $amount) {
        $query = "INSERT INTO `outstanding`(`supplierName`, `purchaseDate`, `limitDate`, `amount`) VALUES (:supplierName, :purchaseDate, :limitDate, :amount)";

        $statement = Controller::getPDO()->prepare($query);
        $statement->bindParam(':supplierName', $supplierName);
        $statement->bindParam(':purchaseDate', $purchaseDate);
        $statement->bindParam(':limitDate', $limitDate);
        $statement->bindParam(':amount', $amount);

        $statement->execute();
    }

    public function updatePaid($id, $isPaid) {
        $query = "UPDATE `outstanding` SET `isPaid` = :isPaid WHERE `idOutstanding` = :id";

        $statement = Controller::getPDO()->prepare($query);

        $statement->bindParam(':id', $id);
        $statement->bindParam('isPaid', $isPaid);

        $statement->execute();
    }
}