<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string', 'max:255'],
        'desc' => ['required', 'string', 'max:255'],
        // 'img' => 'file|image|mimes:jpeg,png,jpg',
    ];

    protected $validasiEdit = [
        'name' => ['required', 'string', 'max:255'],
        'desc' => ['required', 'string', 'max:255'],
        'img' => 'file|image|mimes:jpeg,png,jpg',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'supplier' => Supplier::all(),
        ];

        return view('supplier.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier = new Supplier($request->all());

        $request->validate($this->validasi, $this->messages);

        $supplier->save();
        return redirect('supplier')->with('status', 'supplier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];

        return view('supplier.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];

        return view('supplier.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierRequest  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $request->validate($this->validasiEdit, $this->messages);

        Supplier::where('id', $supplier->id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/supplier')->with('status', 'supplier berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);
        return redirect('supplier')->with('status', 'supplier berhasil dihapus.');
    }
}
