<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/Projected.class.php";

class ProjectedDao
{
    public function findforActualMonth() {
        $query = "SELECT `turnover` FROM `PROJECTED` WHERE `month_id` = DATE_FORMAT(NOW(), '%Y%m')";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        $result = $statement->fetchColumn();

        return isset($result) ? $result : 0;
    }
}