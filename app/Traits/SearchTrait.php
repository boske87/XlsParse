<?php namespace App\Traits;

/**
 * Trait SearchTrait
 * @package App\Traits
 */
/**
 * Trait SearchTrait
 * @package App\Traits
 */
/**
 * Trait SearchTrait
 * @package App\Traits
 */
trait SearchTrait
{
    /**
     * @var array
     */
    private $sortFields = array(
        'id',
        'clientId',
        'clientName',
        'amount',
        'inputDate',
        'fileMetaDataId',
        'sourceId',
        'provider',
    );

    /**
     * @var array
     */
    private $searchField = array(
        'provider',
        'clientName',
        'fileName'
    );

    /**
     * @var array
     */
    private $sortOrder = array(
        'asc',
        'desc'
    );

    /**
     * @param $sortBy
     * @return bool
     */
    public function checkSortBy($sortBy)
    {
        if(in_array($sortBy, $this->sortFields))
            return true;
        else
            return false;
    }

    /**
     * @param $sortOrder
     * @return bool
     */
    public function checkSortOrder($sortOrder)
    {
        if(in_array($sortOrder, $this->sortOrder))
            return true;
        else
            return false;
    }

    /**
     * @param $search
     * @return bool
     */
    public function checkSearch($search)
    {
        if(in_array($search, $this->searchField))
            return true;
        else
            return false;
    }


}