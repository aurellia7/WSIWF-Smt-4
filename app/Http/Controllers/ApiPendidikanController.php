<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 201);
    }
    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($pendidikan, 201);
    }

    public function createPen(Request $request)
    {
        $pendidikan = Pendidikan::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Pendidikan berhasil ditambahkan!'], 201);
    }


    public function updatePen(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $pendidikan->update($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Pendidikan berhasil dihapus!'], 201);
    }


    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $pendidikan->delete();
        return response()->json(['message' => 'Pendidikan berhasil dihapus'], 201);
    }
}
