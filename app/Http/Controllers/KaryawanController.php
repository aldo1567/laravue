<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::get();
        return response()->json([
            'status' => true,
            'message' => 'Successfully get data',
            'data' => $karyawan
        ]);
    }

    public function store(Request $request)
    {
        try {
            $karyawan = Karyawan::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Successfully save data',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return response()->json([
            'status' => true,
            'message' => 'show edit data',
            'data' => $karyawan
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $karyawan = Karyawan::find($id);

            $karyawan->update([
                'name' => $request->name,
                 'email' => $request->email
            ]);

            return response()->json([
                'status' => true,
                'message' => "Successfully update data"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully delete data'
        ]);
    }
}
