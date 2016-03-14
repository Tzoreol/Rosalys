<?php

class Turnover
{
    private $month_id;
    private $amount;

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getMonthId()
    {
        return $this->month_id;
    }

    public function setMonthId($month_id)
    {
        $this->month_id = $month_id;
    }
}