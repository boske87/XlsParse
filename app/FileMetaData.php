<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileMetaData extends Model
{
    protected $fillable = ['fileMetaDataId', 'fileName', 'sourceId', 'provider'];
}
