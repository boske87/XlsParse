<?php

namespace App\Repositories\FileMeta;


interface MetaRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function createIfNotExists(array $fileMetaDataId, array $attributes);
}