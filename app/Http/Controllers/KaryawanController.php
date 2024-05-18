<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\View\View;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $karyawans = Karyawan::all();
        return response()->json([
            'status' => 'success',
            'karyawan' => $karyawans,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'noTelepon' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji' => 'required|integer|max:100000000',
        ]);

        $karyawan = Karyawan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'noTelepon' => $request->noTelepon,
            'posisi' => $request->posisi,
            'gaji' => $request->gaji,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Karyawan created successfully',
            'karyawan' => $karyawan,
        ]);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return response()->json([
            'status' => 'success',
            'karyawan' => $karyawan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'noTelepon' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji' => 'required|integer|max:100000000',
        ]);

        $karyawan = Karyawan::find($id);
        $karyawan->nama = $request->title;
        $karyawan->alamat = $request->alamat;
        $karyawan->noTelepon = $request->noTelepon;
        $karyawan->posisi = $request->posisi;
        $karyawan->gaji = $request->gaji;
        $karyawan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Karyawan updated successfully',
            'karyawan' => $karyawan,
        ]);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Karyawan deleted successfully',
            'karyawan' => $karyawan,
        ]);
    }
}