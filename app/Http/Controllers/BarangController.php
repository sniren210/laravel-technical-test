<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Supplier;
use App\Models\Transaction;
use App\TransactionService;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    protected $validasi = [
        'name' => ['required', 'string', 'max:255'],
        'desc' => ['required', 'string', 'max:255'],
        'jumlah' => ['required', 'string', 'max:255'],
        'harga' => ['required', 'string', 'max:255'],
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
        $data = [
            'supplier' => Supplier::all(),
        ];

        return view('barang.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $req = $request->all();

        $req['user_id'] = strval(app('auth')->user()->id);

        $barang = new Barang($req);

        $barang->img = 'default.png';


        $request->validate($this->validasi, $this->messages);

        if ($request->img) {
            $request->img->originalName =
                time() . '_' . $request->img->getClientOriginalName();

            $request->img->move(
                'img/product',
                $request->img->originalName
            );

            $barang->img =
                $request->img->originalName;
        }



        $res = Barang::create([
            'name' => $barang->name,
            'desc' => $barang->desc,
            'jumlah' => $barang->jumlah,
            'harga' => $barang->harga,
            'supplier_id' => $barang->supplier_id,
            'user_id' => $barang->user_id,
            'img' =>  $barang->img,
        ]);

        if (!empty($res)) {
            $transaction = new TransactionService();

            $transaction->store([
                'desc' => 'Membuat barang ' . $barang->name,
                'is_out' => false,
                'user_id' => strval(app('auth')->user()->id),
                'barang_id' => $res->id,
                'supplier_id' =>  $barang->supplier_id,
            ]);
        }


        return redirect('barang')->with('status', 'barang berhasil ditambahkan.');
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
            'supplier' => Supplier::all()
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


        if ($request->img) {

            if ($request->img->originalName = 'default.png') {
                $request->img->originalName =
                    time() . '_' . $request->img->getClientOriginalName();
            } else {
                $request->img->originalName =
                    time() . '_' . $request->img->getClientOriginalName();
                File::delete('img/product/' . $barang->img);
            }
        }

        $res = Barang::where('id', $barang->id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'supplier_id' => $request->supplier_id,
            'img' => $request->img->originalName ?? $barang->img,
        ]);

        if (!empty($res)) {
            $transaction = new TransactionService();

            if ($request->jumlah != $barang->jumlah) {

                $transaction->store(
                    [
                        'desc' => 'Mengedit barang ' . $barang->name,
                        'is_out' => $request->jumlah < $barang->jumlah,
                        'user_id' => strval(app('auth')->user()->id),
                        'barang_id' => $barang->id,
                        'supplier_id' =>  $barang->supplier_id,
                    ]
                );
            } else {
                $transaction->store(
                    [
                        'desc' => 'Mengedit barang ' . $barang->name,
                        'is_out' => $request->jumlah < $barang->jumlah,
                        'user_id' => strval(app('auth')->user()->id),
                        'barang_id' => $barang->id,
                        'supplier_id' =>  $barang->supplier_id,
                    ]
                );
            }
        }

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
        if (!($barang->foto = 'default.png')) {
            File::delete('img/product/' . $barang->foto);
        }

        Barang::destroy($barang->id);
        return redirect('barang')->with('status', 'barang berhasil dihapus.');
    }
}
