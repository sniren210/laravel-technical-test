<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string', 'max:255'],
        'desc' => ['required', 'string', 'max:255'],
        'jumlah' => ['required', 'string', 'max:255'],
        // 'img' => 'file|image|mimes:jpeg,png,jpg',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'barang' => Barang::all(),
        ];

        return view('barang.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $barang = new Barang($request->all());

        $request->validate($this->validasi, $this->messages);

        $barang->save();
        return redirect('barang$barang')->with('status', 'barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $data = [
            'barang' => $barang,
        ];

        return view('barang.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $data = [
            'barang' => $barang,
        ];

        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $request->validate($this->validasi, $this->messages);

        Barang::where('id', $barang->id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/barang')->with('status', 'barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('barang')->with('status', 'barang berhasil dihapus.');
    }
}
