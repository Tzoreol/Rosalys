<?php

class Projected
{
    private $monthId;
    private $turnover;

    public function getMonthId()
    {
        return $this->monthId;
    }

    public function setMonthId($monthId)
    {
        $this->monthId = $monthId;
    }

    public function getTurnover()
    {
        return $this->turnover;
    }

    public function setTurnover($turnover)
    {
        $this->turnover = $turnover;
    }
}