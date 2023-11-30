<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemasok::get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPemasok = new Pemasok;

        $rules = [
            'id_pemasok' => 'required|numeric|unique:pemasok,id_pemasok',
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPemasok->id_pemasok = $request->id_pemasok;
        $dataPemasok->nama_pemasok = $request->nama_pemasok;
        $dataPemasok->alamat_pemasok = $request->alamat_pemasok;
        $dataPemasok->telepon = $request->telepon;
        $dataPemasok->jenis_kelamin = $request->jenis_kelamin;


        $post = $dataPemasok->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan'
        ]);
    }

    public function show(string $id_pemasok)
    {
        $data = Pemasok::find($id_pemasok);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function update(Request $request, string $id_pemasok)
    {
        $dataPemasok = Pemasok::find($id_pemasok);
        if (empty($dataPemasok)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Mengubah Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPemasok->nama_pemasok = $request->nama_pemasok;
        $dataPemasok->alamat_pemasok = $request->alamat_pemasok;
        $dataPemasok->telepon = $request->telepon;
        $dataPemasok->jenis_kelamin = $request->jenis_kelamin;


        $post = $dataPemasok->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }


    public function destroy(string $id_pemasok)
    {
        $dataPemasok = Pemasok::find($id_pemasok);
        if (empty($dataPemasok)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPemasok->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
