<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryStoreRequest;
use App\Models\PackageGalleries;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gallery.index', [
            'galleries' => PackageGalleries::with('Travel')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create', [
            'travels' => TravelPackage::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryStoreRequest $request)
    {
        $data = $request->all();
        $data['image'] = Session::get('path');

        PackageGalleries::create($data);

        return redirect(route('admin.gallery.index'))->with('success', "Gambar berhasil disimpan!");
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return view('admin.gallery.list', [
            'galleries' => PackageGalleries::with('Travel')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageGalleries $gallery)
    {
        return view('admin.gallery.edit', [
            'gallery' => $gallery,
            'galleries' => PackageGalleries::with('Travel')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryStoreRequest $request, PackageGalleries $gallery)
    {
        if (Session::get('path')) {
            $data = $request->all();
            $data['image'] = Session::get('path');
            $delete_old_image = $request->old_image_path;
            Storage::delete($delete_old_image);

            $gallery->update($data);

            return 'Gambar berhasil diperbaharui';
        }

        return redirect(route('admin.gallery.list'))->with('success-edit', "Gambar berhasil diperbaharui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageGalleries $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();

        return redirect(route('admin.gallery.list'))->with('success-delete', "Gambar berhasil dihapus!");
    }

    public function filepond(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'ImgTravel'.'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/travel-galleries/'.$filename);
            $path = 'public/travel-galleries/'.$filename;

            Session::put('path', $path);
            return 'Berhasil Simpan Data!';
        }
    }

    public function cancel()
    {
        $deletepath = Session::get('path');
        Storage::delete($deletepath);
        Session::forget('path');
        return 'Gambar dan Session Path berhasil dihapus';
    }
}
