<?php

namespace App;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Throwable;

class TransactionService
{
    public function store(array $transaction)
    {
        Transaction::create([
            'desc' => $transaction['desc'],
            'is_out' => $transaction['is_out'],
            'user_id' => $transaction['user_id'],
            'barang_id' => $transaction['barang_id'],
            'supplier_id' => $transaction['supplier_id'],
        ]);
    }

    public function update(Request $attrs, Transaction $transaction)
    {
        try {

            Transaction::where('id', $transaction->id)->update([
                'desc' => $attrs->desc,
                'is_out' => $attrs->is_out,
                'user_id' => $attrs->user_id,
                'barang_id' => $attrs->barang_id,
                'supplier_id' => $attrs->supplier_id,
            ]);

            return true;
        } catch (Throwable $th) {

            return false;
        }
    }
}
