<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RequirementResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'clientId' => $this->clientId,
            'clientName' => $this->client->clientName,
            'amount' => $this->amount,
            'inputDate' => $this->inputDate,
            'fileName' => $this->fileName,
            'fileMetaDataId' => $this->fileMetaDataId,
            'sourceId' => $this->fileMetaData->sourceId,
            'provider' => $this->fileMetaData->provider,
        ];
    }
}
