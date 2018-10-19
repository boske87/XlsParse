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
    public function index()
    {
        return view('parser.upload');
    }

    public function uploadFile(FileUpload $request, ExcelImport $excelImport)
    {
        try {
            Excel::import($excelImport, request()->file('fileUpload'));
        } catch (Exception $e) {
            report($e);

            return back()->withErrors(['msg', 'Error']);

        }

        return redirect()->route('parse.view-table');


    }

    public function viewTable(){

        $items = Requirement::paginate();


        return view('parser.table', compact('items'));

    }
}
