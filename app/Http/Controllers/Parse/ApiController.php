<?php

namespace App\Http\Controllers\Parse;

use App\Http\Resources\RequirementResource;
use App\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function viewData(){

        $data = Requirement::paginate();

        return RequirementResource::collection($data);
    }
}
