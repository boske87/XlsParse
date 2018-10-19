<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = ['clientId', 'amount', 'inputDate', 'fileMetaDataId'];


    public function client(){
        return $this->hasOne('App\Client', 'id', 'id');
    }

    public function fileMetaData(){
        return $this->hasOne('App\FileMetaData', 'id', 'id');
    }
}
