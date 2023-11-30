<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PenjualanController extends Controller
{

    public function index()
    {
        $data = Penjualan::get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $dataPenjualan = new Penjualan;

        $rules = [
            'id_penjualan' => 'required|numeric|unique:penjualan,id_penjualan',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'total_pembayaran' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'tanggal' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPenjualan->id_penjualan = $request->id_penjualan;
        $dataPenjualan->id_barang = $request->id_barang;
        $dataPenjualan->id_pelanggan = $request->id_pelanggan;
        $dataPenjualan->total_pembayaran = $request->total_pembayaran;
        $dataPenjualan->metode_pembayaran = $request->metode_pembayaran;
        $dataPenjualan->status_pembayaran = $request->status_pembayaran;
        $dataPenjualan->tanggal = $request->tanggal;


        $post = $dataPenjualan->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan'
        ]);
    }

    public function show(string $id_penjualan)
    {
        $data = Penjualan::find($id_penjualan);
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

    public function update(Request $request, string $id_penjualan)
    {
        $dataPenjualan = Penjualan::find($id_penjualan);
        if (empty($dataPenjualan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'id_barang' => 'required|exists:barang,id_barang',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'total_pembayaran' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'tanggal' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPenjualan->id_barang = $request->id_barang;
        $dataPenjualan->id_pelanggan = $request->id_pelanggan;
        $dataPenjualan->total_pembayaran = $request->total_pembayaran;
        $dataPenjualan->metode_pembayaran = $request->metode_pembayaran;
        $dataPenjualan->status_pembayaran = $request->status_pembayaran;
        $dataPenjualan->tanggal = $request->tanggal;


        $post = $dataPenjualan->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }

    public function destroy(string $id_penjualan)
    {
        $dataPenjualan = Penjualan::find($id_penjualan);
        if (empty($dataPenjualan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPenjualan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
