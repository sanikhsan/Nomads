<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UploadTransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard', [
            'transactions' => Transaction::with(['TrxTravel', 'TrxDetail'])->where('users_id', Auth::user()->id)->get()
        ]);
    }

    public function detail(Transaction $transaction)
    {
        return view('customer.detail', [
            'transaction' => $transaction
        ]);
    }

    public function payment(Transaction $transaction)
    {
        // $transaction = Transaction::with('TrxTravel')->where('users_id', Auth::user()->id)->findOrFail($id);

        return view('customer.up-transfer', [
            'transaction' => $transaction
        ]);
    }

    public function update(UploadTransactionRequest $request, Transaction $transaction)
    {
        $filename = Session::get('filename');
        $old_image_path = Session::get('path');
        $new_image_path = 'public/transactions/'.$filename;
        Storage::move($old_image_path, $new_image_path);

        $data = $request->all();
        $data['transaction_image'] = $new_image_path;
        $data['transaction_status'] = 'PAID';

        $transaction->update($data);
        return redirect(route('customer.dashboard'))->with('success-edit', "Berhasil Upload Bukti Transaksi!");
    }

    public function cancel(Transaction $transaction)
    {
        $transaction->transaction_status = 'CANCELED';
        $transaction->save();

        return redirect(route('customer.dashboard'))->with('success-delete', "Pesanan kamu Berhasil dibatalkan!");
    }

    // *
    // FilePond Controller
    // *

    public function filepond(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'TrxImage'.'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/tmp/transactions/'.$filename);
            $path = 'public/tmp/transactions/'.$filename;

            Session::put('filename', $filename);
            Session::put('path', $path);
            return 'Berhasil Simpan Gambar Transaksi!';
        }
    }

    public function delete()
    {
        $deletepath = Session::get('path');
        Storage::delete($deletepath);
        Session::forget('path');
        return 'Gambar dan Session Path berhasil dihapus';
    }
}
