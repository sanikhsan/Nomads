<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.index', [
            'travels' => TravelPackage::with('Gallery')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        return view('landing.detail-page', [
            'travel' => TravelPackage::with('Galleries')->where('slug', $slug)->firstOrFail()
        ]);
    }
}
