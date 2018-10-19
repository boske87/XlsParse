<?php

namespace App\Imports;

use App\Client;
use App\FileMetaData;
use App\Requirement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        Client::truncate();
        FileMetaData::truncate();
        Requirement::truncate();
        foreach ($rows as $row) {
            $this->insertAttributeRequirement($row);
            $this->insertAttributeClient($row);
            $this->insertAttributeFileMetaData($row);
        }

        return count($rows);
    }


    public function chunkSize(): int
    {
        return 500;
    }


    private function insertAttributeRequirement($row)
    {
        Requirement::create([
            'clientId'=>$row['clientid'],
            'amount'=>$row['amount'],
            'inputDate'=> new Carbon($row['inputdate']),
            'fileMetaDataId'=> $row['filemetadataid'],
        ]);
    }

    private function insertAttributeClient($row)
    {
        Client::create([
            'clientId'=>$row['clientid'],
            'clientName'=>$row['clientname'],
        ]);
    }

    private function insertAttributeFileMetaData($row)
    {
        $sourceProvider = explode(':', $row['source']);
        FileMetaData::create([
            'fileMetaDataId'=> $row['filemetadataid'],
            'fileName'=> $row['filename'],
            'sourceId'=>$sourceProvider[0],
            'provider'=>$sourceProvider[1],
        ]);
    }
}
