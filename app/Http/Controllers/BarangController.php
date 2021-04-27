<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function barang()
    {
        $barang = DB::table('barang')->get();
        return view('databarang', ['barang' => $barang]);
    }

    public function pegawai()
    {
        $pegawai = DB::table('pegawai')->get();
        return view('datapegawai', ['pegawai' => $pegawai]);
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function input()
    {
        return view('databarang.input');
    }

    public function inputproses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ], [
            'nama.required' => 'Bagian nama tidak boleh kosong!',
            'harga.required' => 'Bagian harga tidak boleh kosong!',
            'jumlah.required' => 'Bagian jumlah tidak boleh kosong!',
        ]);

        DB::table('barang')->insert([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ]);
        return redirect('databarang')->with('status', 'Barang berhasil ditambah!');
    }

    public function edit($id)
    {
        $databarang = DB::table('barang')->where('id', $id)->first();
        return view('databarang.edit', compact('databarang'));
    }

    public function editproses(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ], [
            'nama.required' => 'Bagian nama tidak boleh kosong!',
            'harga.required' => 'Bagian harga tidak boleh kosong!',
            'jumlah.required' => 'Bagian jumlah tidak boleh kosong!',
        ]);

        DB::table('barang')->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah
            ]);
        return redirect('databarang')->with('status', 'Barang berhasil dirubah!');
    }

    public function hapus($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        return redirect('databarang')->with('status', 'Barang berhasil dihapus!');
    }
}
