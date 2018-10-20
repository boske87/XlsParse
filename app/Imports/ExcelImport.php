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
    public function collection(Collection $rows): int
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


    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 500;
    }


    /**
     * @param array $row
     */
    private function insertAttributeRequirement($row) : void
    {
        Requirement::create([
            'clientId'=>$row['clientid'],
            'amount'=>$row['amount'],
            'inputDate'=> new Carbon($row['inputdate']),
            'fileMetaDataId'=> $row['filemetadataid'],
        ]);
    }

    /**
     * @param array $row
     */
    private function insertAttributeClient($row) : void
    {
        Client::create([
            'clientId'=>$row['clientid'],
            'clientName'=>$row['clientname'],
        ]);
    }


    /**
     * @param array $row
     */
    private function insertAttributeFileMetaData($row) : void
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
