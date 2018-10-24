<?php

namespace App\Http\Controllers\Parse;

use App\Http\Resources\RequirementResource;
use App\Requirement;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ApiController
 * @package App\Http\Controllers\Parse
 */
class ApiController extends Controller
{
    /**
     * @var array
     */
    private $select = array(
        'requirements.id',
        'requirements.clientId',
        'clients.clientName',
        'requirements.amount',
        'requirements.inputDate',
        'requirements.fileMetaDataId',
        'file_meta_datas.sourceId',
        'file_meta_datas.provider',
        'file_meta_datas.fileName'
    );

    use SearchTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function viewData(Request $request){

        //joint tables
       $data = Requirement::select($this->select)
           ->join('clients', 'requirements.clientId', '=', 'clients.clientId')
           ->join('file_meta_datas', 'requirements.fileMetaDataId', '=', 'file_meta_datas.fileMetaDataId');


       //sort by fields
        if($request->has('sortOrder') && $request->has('sortBy'))
        {
            if($this->checkSortOrder($request->get('sortOrder')) && $this->checkSortBy($request->get('sortBy')))
            {
                $data = $data->orderBy($request->get('sortBy'), $request->get('sortOrder'));
            }
        }

        //search
        if($request->has('searchBy') && $request->has('searchFilter'))
        {
            if($this->checkSearch($request->get('searchBy')))
            {
                $data = $data->where($request->get('searchBy'),'=', $request->get('searchFilter'));
            }
        }

        //paginate
        $data = $data->paginate();

        return RequirementResource::collection($data);
    }
}
