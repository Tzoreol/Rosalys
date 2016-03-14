<?php

require_once dirname(dirname(dirname(__FILE__))) .DIR_SEPARATOR.CONTROLLERS_DIR.DIR_SEPARATOR. "Controller.class.php";
require_once dirname(dirname(__FILE__)) .DIR_SEPARATOR. "Entities/Turnover.class.php";

class TurnoverDao
{
    public function findLastYearTurnover() {
        $query = "SELECT `amount` FROM `turnover` WHERE `month_id` = DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 YEAR ), '%Y%m')";
        $statement = Controller::getPDO()->prepare($query);

        $statement->execute();

        $result = $statement->fetchColumn();
        return isset($result) ? $result  : 0;
    }
}