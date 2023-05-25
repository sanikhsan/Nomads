<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionUpdateRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.transaksi.index', [
            'transactions' => Transaction::with(['TrxUser', 'TrxTravel'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaksi.show', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaksi.edit', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $data = $request->all();
        $transaction->update($data);

        return redirect(route('admin.transaction.index'))->with('success-edit', 'Status Transaction Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect(route('admin.transaction.index'))->with('success-delete', 'A Transaction Has Been Deleted!');
    }
}
