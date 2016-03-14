<?php

require_once(dirname(dirname(__FILE__)) . DIR_SEPARATOR . "/Daos/EntryTypeDao.class.php");

class EntryDto
{
    private $idEntry;
    private $date;
    private $entryType;
    private $entryTypeType;
    private $label;
    private $amount;
    private $pointed;

    public function getIdEntry()
    {
        return $this->idEntry;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getEntryType()
    {
        return $this->entryType;
    }

    public function getEntryTypeType()
    {
        return $this->entryTypeType;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPointed()
    {
        return $this->pointed;
    }

    public function EntriesDbToEntriesDto($entriesDb) {

        $entriesDto = array();

        foreach($entriesDb as $entryDb) {
            $dto = new EntryDto();
            $dto->date = date('d/m/Y', strtotime($entryDb->getDate()));

            $entryTypeDao = new EntryTypeDao();
            $dto->entryType = $entryTypeDao->findLabelById($entryDb->getEntryType());
            $dto->entryTypeType = $entryTypeDao->findEntryTypeTypeById($entryDb->getEntryType());


            $dto->label = $entryDb->getLabel();
            $dto->amount = $entryDb->getAmount() . " &euro;";
            $dto->pointed = $entryDb->getPointed() ? "Point&eacute;" : '<input type="checkbox" class="entryCheckbox" id="entry' .$entryDb->getIdEntry(). '" />';

            array_push($entriesDto, $dto);
        }

        return $entriesDto;
    }
}