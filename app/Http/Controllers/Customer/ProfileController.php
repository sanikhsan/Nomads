<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PasswordUpdateRequest;
use App\Http\Requests\Customer\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('customer.profile', [
            'user' => $request->user(),
        ]);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $data = $request->all();
        $request->user()->update($data);

        return redirect(route('customer.profile'))->with('success-edit', 'Profile Berhasil DiPerbaharui!');
    }

    public function password()
    {
        return view('customer.change-password');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $data = Hash::make($request->password);
        $request->user()->update(['password' => $data]);
        
        return redirect(route('customer.password'))->with('success-edit', "Password Berhasil diperbaharui!");
    }
}
