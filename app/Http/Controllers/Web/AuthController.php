<?php

namespace App\Http\Controllers\Web;

use App\Models\Buyer;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    public function signInBuyer(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth('buyer')->attempt($credential)) {
            $buyer = Buyer::where('username', $request->username)->first();

            return redirect()->route('')->with('success', 'anda berhasil login');
        } else {
            return back();
        }
    }

    public function signUpBuyer(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required|unique:buyers|max:40',
            'email' => 'required|unique:buyers',
            'password' => 'required|min:5',
            'phone' => 'required',
            'address' => 'required',
            'zip_code' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->route('')->withErrors($validate)->withInput();
        }

        $buyer = Buyer::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'zip_code' => $request->zip_code
        ]);


        return redirect()->route('')->with('success', 'anda berhasil login');
    }

    //! auth admin belum ya
}


