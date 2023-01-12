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
        $data = [
            "user" => User::count(),
            "barang" => Barang::count(),
            "supplier" => Supplier::count(),
            "transaction" => Transaction::count(),
        ];

        return view('dashboard.home', $data);
    }
}
