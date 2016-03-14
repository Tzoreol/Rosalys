<?php

class OutstandingDto
{
    private $supplierName;
    private $purchaseDate;
    private $limitDate;
    private $amount;
    private $isPaid;

   public function getSupplierName()
    {
        return $this->supplierName;
    }

    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
    }

    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
    }

    public function getLimitDate()
    {
        return $this->limitDate;
    }

    public function setLimitDate($limitDate)
    {
        $this->limitDate = $limitDate;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getIsPaid()
    {
        return $this->isPaid;
    }

    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;
    }

    public function outstandingsDbToOutstandingsDto($outstandingsDb) {
        $outstandingsDto = array();

        foreach($outstandingsDb as $outstandingDb) {
            $dto = new OutstandingDto();

            $dto->supplierName = $outstandingDb->getSupplierName();
            $dto->purchaseDate = date('d/m/Y', strtotime($outstandingDb->getPurchaseDate()));
            $dto->limitDate = date('d/m/Y', strtotime($outstandingDb->getPurchaseDate()));

            $dto->amount = $outstandingDb->getAmount() . " &euro;";
            $dto->isPaid = $outstandingDb->getIsPaid() ? "Pay&eacute;" : '<input type="checkbox" class="outstandingCheckbox" id="outstanding' .$outstandingDb->getIdOutstanding(). '" />';

            array_push($outstandingsDto, $dto);
        }

        return $outstandingsDto;
    }
}