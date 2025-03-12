<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll(){
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 201);
    }
}
