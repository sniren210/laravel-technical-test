<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $transaction = Transaction::all();
        $user = User::all();

        dd($user[0]->barang);

        return view('welcome');
    }
}
