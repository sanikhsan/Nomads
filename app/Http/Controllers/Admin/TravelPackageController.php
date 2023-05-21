<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageStoreRequest;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.travel.index', [
           'travels' => TravelPackage::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelPackageStoreRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title.'-'.Str::random(5).'-nomads');
        
        TravelPackage::create($data);
        return redirect(route('admin.travels.index'))->with('success', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelPackage $travel)
    {
        return view('admin.travel.edit', [
            'travel' => $travel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPackageStoreRequest $request, TravelPackage $travel)
    {
        $travel->update($request->all());
        return redirect(route('admin.travels.index'))->with('success-edit', "Travel Package with Name \"{$travel->title}\" has been Edited!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelPackage $travel)
    {
        $travel->delete();
        return redirect(route('admin.travels.index'))->with('success-delete', "Travel Package with Name \"{$travel->title}\" has been Deleted!");
    }
}
