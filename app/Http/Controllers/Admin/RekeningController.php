<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RekeningRequest;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rekening.index', [
            'rekenings' => Rekening::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RekeningRequest $request, Rekening $rekening)
    {
        $rekening->create($request->all());

        return redirect(route('admin.rekening.index'))->with('success', "Rekening berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * public function show(string $id)
     * {
     *    //
     * }
     * 
     **/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekening $rekening)
    {
        return view('admin.rekening.edit', [
            'rekening' => $rekening
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RekeningRequest $request, Rekening $rekening)
    {
        $rekening->update($request->all());

        return redirect(route('admin.rekening.index'))->with('success-edit', "Data Rekening Berhasil diperbaharui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();

        return redirect(route('admin.rekening.index'))->with('success-delete', "Data Rekening Berhasil dihapus!");
    }
}
