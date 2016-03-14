<?php

class EntryType
{
    private $idEntryType;
    private $entryTypeType;
    private $label;

    public function getIdEntryType()
    {
        return $this->idEntryType;
    }

    public function setIdEntryType($id)
    {
        $this->idEntryType = $id;
    }

    public function getEntryTypeType()
    {
        return $this->entryTypeType;
    }

    public function setEntryTypeType($entryTypeType)
    {
        $this->entryTypeType = $entryTypeType;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }
}