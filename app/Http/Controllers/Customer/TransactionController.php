<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\TransactionRequest;
use App\Models\Rekening;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function in_cart(Request $request, $id)
    {
        // Mengambil Data Travel Package dari parameter id
        $travel = TravelPackage::findOrFail($id);

        if (Auth::user()->is_visa) {
            // Add (Create) new Transaction to Database with status in CART
            $In_Cart_Transaction = Transaction::create([
                'travel_packages_id' => $id,
                'users_id' => Auth::user()->id,
                'additional_visa' => 0,
                'transaction_total' => $travel->price,
                'transaction_status' => 'IN_CART'
            ]);
        } else {
            // Add (Create) new Transaction to Database with status in CART
            $In_Cart_Transaction = Transaction::create([
                'travel_packages_id' => $id,
                'users_id' => Auth::user()->id,
                'additional_visa' => $travel->additional_visa,
                'transaction_total' => $travel->additional_visa + $travel->price,
                'transaction_status' => 'IN_CART'
            ]);   
        }

        // Insert self Transaction to Transaction Detail
        TransactionDetail::create([
            'transactions_id' => $In_Cart_Transaction->id,
            'username' => Auth::user()->username,
            'nationality' => Auth::user()->nationality,
            'is_visa' => Auth::user()->is_visa,
            'doe_passport' => Auth::user()->doe_passport,
        ]);

        return redirect(route('customer.cart_review', $In_Cart_Transaction->id));
    }

    public function cart_review(Request $request, $id)
    {
        return view('landing.checkout-page', [
            'travel' => Transaction::with(['TrxDetail', 'TrxUser', 'TrxTravel'])->findOrFail($id),
            'rekenings' => Rekening::get()
        ]);
    }

    public function add_member(TransactionRequest $request, $id)
    {
        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with('TrxTravel')->find($id);

        if ($request->is_visa) {
            // Jika New Member memiliki VISA maka total harga baru adalah (Total Lama = total lama + biaya harga travel)
            $new_total_transaction = $transaction->transaction_total + $transaction->TrxTravel->price;

            // Update data
            $transaction->transaction_total = $new_total_transaction;
        } else {
            // Jika New Member tidak memiliki VISA maka total harga baru adalah (Total Lama = total lama + biaya visa + biaya harga travel)
            $new_additional_visa = $transaction->additional_visa + $transaction->TrxTravel->additional_visa;
            $new_total_transaction = $transaction->transaction_total + $new_additional_visa + $transaction->TrxTravel->price;

            // Update data
            $transaction->additional_visa = $new_additional_visa;
            $transaction->transaction_total = $new_total_transaction;
        }
        $transaction->save();

        return redirect(route('customer.cart_review', $id));
    }

    public function remove_member(Request $request, $detail_id)
    {
        $detailTrx = TransactionDetail::findorFail($detail_id);

        $transaction = Transaction::with(['TrxTravel', 'TrxDetail'])->findOrFail($detailTrx->transactions_id);

        if ($detailTrx->is_visa) {
            // Jika New Member memiliki VISA maka total harga baru adalah (Total Lama = total lama - biaya harga travel)
            $new_total_transaction = $transaction->transaction_total- $transaction->TrxTravel->price;
            // Update data
            $transaction->transaction_total = $new_total_transaction;
        } else {
            // Jika New Member tidak memiliki VISA maka total harga baru adalah (Total Lama = total lama - biaya visa - biaya harga travel)
            $new_additional_visa = $transaction->additional_visa - $transaction->TrxTravel->additional_visa;
            $new_total_transaction = $transaction->transaction_total - $transaction->additional_visa - $transaction->TrxTravel->price;

            // Update data
            $transaction->additional_visa = $new_additional_visa;
            $transaction->transaction_total = $new_total_transaction;
        }

        $transaction->save();
        $detailTrx->delete();

        return redirect(route('customer.cart_review', $detailTrx->transactions_id));

    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();

        return view('landing.success-checkout-page');
    }

    public function cancel(Request $request, $id)
    {
        $trxDetail = TransactionDetail::where('transactions_id', $id);
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'FAILED';
        $transaction->save();
        $trxDetail->delete();
        $transaction->delete();

        return view('landing.cancel-checkout-page');
    }
}
