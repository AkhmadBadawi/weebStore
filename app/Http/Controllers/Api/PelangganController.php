<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{

    public function index()
    {
        $data = Pelanggan::get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $dataPelanggan = new Pelanggan;

        $rules = [
            'id_pelanggan' => 'required|numeric|unique:pelanggan,id_pelanggan',
            'nama_pelanggan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
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

        $dataPelanggan->id_pelanggan = $request->id_pelanggan;
        $dataPelanggan->nama_pelanggan = $request->nama_pelanggan;
        $dataPelanggan->email = $request->email;
        $dataPelanggan->alamat = $request->alamat;
        $dataPelanggan->jenis_kelamin = $request->jenis_kelamin;


        $post = $dataPelanggan->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan'
        ]);
    }

    public function show(string $id_pelanggan)
    {
        $data = Pelanggan::find($id_pelanggan);
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


    public function update(Request $request, string $id_pelanggan)
    {
        $dataPelanggan = Pelanggan::find($id_pelanggan);
        if (empty($dataPelanggan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nama_pelanggan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
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


        $dataPelanggan->nama_pelanggan = $request->nama_pelanggan;
        $dataPelanggan->email = $request->email;
        $dataPelanggan->alamat = $request->alamat;
        $dataPelanggan->jenis_kelamin = $request->jenis_kelamin;


        $post = $dataPelanggan->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate'
        ]);
    }


    public function destroy(string $id_pelanggan)
    {
        $dataPelanggan = Pelanggan::find($id_pelanggan);
        if (empty($dataPelanggan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPelanggan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
