<?php

require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/EntryDao.class.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/OutstandingDao.class.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/ProjectedDao.class.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Daos/TurnoverDao.class.php");

require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Dtos/EntryDto.class.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIR_SEPARATOR . "Domain/Dtos/OutstandingDto.class.php");

class Dashboard extends Controller
{
    protected $projected_turnover;
    protected $projectedTurnover_percentage;
    protected $lastYear_turnover;
    protected $lastYearTurnover_percentage;
    protected $actualMonth_turnover;
    protected $month_cashing;
    protected $month_withdrawal;
    protected $month_balance;
    protected $balanceStyle;
    protected $entries;
    protected $outstandings;

    function __construct()
    {
        array_push($this->_js, 'dashboard');
    }

    function init() {
        if($this->isUserLogged()) {
            $projectedDao = new ProjectedDao();
            $this->projected_turnover = $projectedDao->findforActualMonth();

            $turnoverDao = new TurnoverDao();
            $this->lastYear_turnover = $turnoverDao->findLastYearTurnover();

            $entryDao = new EntryDao();
            $this->actualMonth_turnover = $entryDao->findActualMonthTurnover();
            $this->month_cashing = $entryDao->findMonthCashing();
            $this->month_withdrawal = $entryDao->findMonthWithdrawal();
            $this->month_balance = $this->month_cashing - $this->month_withdrawal;
            $this->balanceStyle = $this->month_balance < 0 ? "debit" : "credit";

            $this->projectedTurnover_percentage = $this->projected_turnover == 0 ? 1 : round(($this->actualMonth_turnover / $this->projected_turnover) * 100, 2);
            $this->lastYearTurnover_percentage = $this->lastYear_turnover == 0 ? 1 : round(($this->actualMonth_turnover / $this->lastYear_turnover) * 100, 2);

            $entryDto = new EntryDto();
            $this->entries = $entryDto->EntriesDbToEntriesDto($entryDao->findLast30());

            $outstandingDao = new OutstandingDao();
            $outstandingDto = new OutstandingDto();
            $this->outstandings = $outstandingDto->outstandingsDbToOutstandingsDto($outstandingDao->findNotPaid());

            include(dirname(dirname(dirname(__FILE__))) . "/Views/Dashboard/Dashboard.php");
        } else {
            header('Location: ' .BASE_DIR);
        }
    }

    function lastYearLabel() {
        setlocale(LC_ALL, "fr-FR");
        return strftime("%B %Y", strtotime("last year"));
    }

    function getStyle($i) {
        return ($i % 2 == 0) ? "odd" : "even";
    }

    function percentageColor($pc) {
        $red = ($pc > 50) ? 255 - (255 * ($pc / 100)) : 255;
        $green = ($pc < 50) ? (255 * ($pc / 100)) : 255;

        return 'rgb(' .round($red). ',' .round($green). ',0);';
    }
}