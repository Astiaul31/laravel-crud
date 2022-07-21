<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Siswa
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //validasi
          $validated = $request->validate([
            'nama' => 'required',
            'tgl_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        $pembelian = new Pembelian();
        $pembelian->nama = $request->nama;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->harga = $request->harga;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total = $pembelian->harga * $pembelian->jumlah;
        $pembelian->save();
        return redirect()->route('pembelian.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
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
        // Validasi
        $validated = $request->validate([
            'nama' => 'required',
            'tgl_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            
        ]);

        $pembelian =Pembelian::findOrFail($id);
        $pembelian->nama = $request->nama;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->harga = $request->harga;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total = $pembelian->harga * $pembelian->jumlah;
        $pembelian->save();
        return redirect()->route('pembelian.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelian.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}