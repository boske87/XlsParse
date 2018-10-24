<?php

namespace App\Repositories\FileMeta;

use App\FileMetaData;

class MetaRepository implements MetaRepositoryInterface
{
    public $items;

    function __construct(FileMetaData $items) {
        $this->items = $items;
    }


    public function createIfNotExists(array $fileMetaDataId, array $attributes)
    {

        return $this->items->firstOrCreate($fileMetaDataId, $attributes);
    }

    public function getAll()
    {
        return $this->items->getAll();
    }

    public function find($id)
    {
        return $this->items->findItem($id);
    }

}