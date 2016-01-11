<?php

namespace IB\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
* @MongoDB\Document
*/
class Project
{

/**
* @MongoDB\Id
*/
protected $id;

/**
* @MongoDB\String
*/
protected $name;

/**
* @MongoDB\String
*/
protected $currencyType;

/**
* @MongoDB\Float
*/
protected $cost;

/**
* @MongoDB\Date
*/
protected $initDate;

/**
* @MongoDB\File
*/
protected $refDoc;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set currencyType
     *
     * @param string $currencyType
     * @return self
     */
    public function setCurrencyType($currencyType)
    {
        $this->currencyType = $currencyType;
        return $this;
    }

    /**
     * Get currencyType
     *
     * @return string $currencyType
     */
    public function getCurrencyType()
    {
        return $this->currencyType;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return self
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Get cost
     *
     * @return float $cost
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set initDate
     *
     * @param date $initDate
     * @return self
     */
    public function setInitDate($initDate)
    {
        $this->initDate = $initDate;
        return $this;
    }

    /**
     * Get initDate
     *
     * @return date $initDate
     */
    public function getInitDate()
    {
        return $this->initDate;
    }

    /**
     * Set refDoc
     *
     * @param file $refDoc
     * @return self
     */
    public function setRefDoc($refDoc)
    {
        $this->refDoc = $refDoc;
        return $this;
    }

    /**
     * Get refDoc
     *
     * @return file $refDoc
     */
    public function getRefDoc()
    {
        return $this->refDoc;
    }
}
