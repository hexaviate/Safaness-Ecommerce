<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::paginate(10);
        return view('admin.components.transaction.index', compact('data'));
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
    public function show(string $id)
    {
        $data = Transaction::with('buyer')->where('id', $id)->get();
        // dd($data);
        $details = TransactionDetail::where('transaction_id', $id)->get();
        return view('admin.components.transaction.show', compact('data', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Transaction::findOrFail($id);
        return view('admin.components.transaction.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Transaction::find($id);
        $validate = Validator::make($request->all(), [
            "status" => "required",
            "information" => "required"
        ]);

        if ($validate->fails()) {
            return redirect()->route('transaction.edit', $target)->withErrors($validate)->withInput();
        }

        $target->update($validate->validated());

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validatePayment(string $id)
    {
        // $user = auth()->user();
        // if (!$user) {
        //     return redirect()->back()->with('error', 'anda harus login');
        // }

        $transaction = Transaction::find($id)->first();
        // dd($transaction);

        if ($transaction->status == "processing" || $transaction->status == "shipping" || $transaction->status == "success" || $transaction->status == "failed") {
            return redirect()->back()->with('error', 'tidak bisa memvalidasi pembayaran');
        }


        $transaction->update([
            "status" => "processing"
        ]);

        return redirect()->route('transaction.index')->with('success', 'berhasil validasi pembayaran');
    }
}
