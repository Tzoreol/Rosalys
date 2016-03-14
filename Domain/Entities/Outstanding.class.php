<?php

class Outstanding
{
    private $idOutstanding;
    private $supplierName;
    private $purchaseDate;
    private $limitDate;
    private $paiementDate;
    private $amount;
    private $isPaid;

    public function getIdOutstanding()
    {
        return $this->idOutstanding;
    }

    public function setIdOutstanding($idOutstanding)
    {
        $this->idOutstanding = $idOutstanding;
    }

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

    public function getPaiementDate()
    {
        return $this->paiementDate;
    }

    public function setPaiementDate($paiementDate)
    {
        $this->paiementDate = $paiementDate;
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
}