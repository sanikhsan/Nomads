<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.profile', [
            'user' => $request->user(),
        ]);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $data = $request->all();
        $request->user()->update($data);

        return redirect(route('admin.profile'))->with('success-edit', 'Profile Berhasil DiPerbaharui!');
    }

    public function password()
    {
        return view('admin.change-password');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $data = Hash::make($request->password);
        $request->user()->update(['password' => $data]);
        
        return redirect(route('admin.password'))->with('success-edit', "Password Berhasil diperbaharui!");
    }
}
