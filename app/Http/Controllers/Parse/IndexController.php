<?php

namespace App\Http\Controllers\Parse;

use App\Http\Requests\FileUpload;

use App\Http\Resources\RequirementResource;
use App\Imports\ExcelImport;
use App\Requirement;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;



class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('parser.upload');
    }

    /**
     * @param FileUpload $request
     * @param ExcelImport $excelImport
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function uploadFile(FileUpload $request, ExcelImport $excelImport)
    {
        //try to import xls file to database
        try {
            Excel::import($excelImport, request()->file('fileUpload'));
        } catch (Exception $e) {
            report($e);

            return back()->withErrors(['msg', 'Error']);

        }

        return redirect()->route('parse.view-table');


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewTable(){

        $items = Requirement::paginate();


        return view('parser.table', compact('items'));

    }
}
