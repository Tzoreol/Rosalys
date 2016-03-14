<?php

class Entry
{
    private $idEntry;
    private $date;
    private $entryType;
    private $label;
    private $amount;
    private $pointed;

    public function getIdEntry()
    {
        return $this->idEntry;
    }

    public function setIdEntry($id)
    {
        $this->idEntry = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getEntryType()
    {
        return $this->entryType;
    }

    public function setEntryType($entryType)
    {
        $this->entryType = $entryType;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getPointed()
    {
        return $this->pointed;
    }

    public function setPointed($pointed)
    {
        $this->pointed = $pointed;
    }
}