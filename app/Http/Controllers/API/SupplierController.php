<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from table Supplier
        $Supplier = Supplier::all();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Data Supplier',
            'data' => $Supplier,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Supplier = new Supplier();
        $Supplier->nama = $request->nama;
        $time = date('ymd');
        $random = mt_rand(1000, 9999);
        $Supplier->nama_supplier = $request->nama_supplier;
        $Supplier->no_telepon = $request->no_telepon;
        $Supplier->alamat = $request->alamat;
        $Supplier->harga = $request->harga;
        $Supplier->ket = $request->ket;

        $Supplier->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Supplier Berhasil Dibuat',
            'data' => $Supplier,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Supplier = Supplier::findOrFail($id);
        if ($Supplier) {
            return response()->json([
                'success' => true,
                'message' => 'Menampilkan Data Supplier',
                'data' => $Supplier,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Supplier Tidak Ditemukan',
                'data' => [],
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Supplier = Supplier::findOrFail($id);
        $Supplier->nama_supplier = $request->nama_supplier;
        $Supplier->no_telepon = $request->no_telepon;
        $Supplier->alamat = $request->alamat;
        $Supplier->harga = $request->harga;
        $Supplier->ket = $request->ket;

        $Supplier->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Supplier Berhasil Dibuat',
            'data' => $Supplier,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Supplier = Supplier::findOrFail($id);
        $Supplier->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Supplier Berhasil Dihapus',
            'data' => $Supplier,
        ], 200);

    }
}
