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
        $data = Transaction::all();
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
        $data = Transaction::where('id', $id)->get();
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        return view('admin.components.transaction.show', compact('data', 'detail'));
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
}
