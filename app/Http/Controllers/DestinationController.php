<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destination = Destination::get();
        return view('admin.destination.destination', ['destination' => $destination]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.destination.add-destination');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {

        // dd($request);
        $images = $request->file('image');
        $imageData = [];

        foreach ($images as $image) {
            $image->storeAs('public/destination', $image->hashName());
            $imageData[] = $image->hashName();
        }

        // create post
        $destination = Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => json_encode($imageData)
        ]);

        $destination->save();

        return redirect()->route('destination.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destination = Destination::with('packages')->findOrFail($id);
        // $destination = Destination::with('packages')->where('name', $id)->first();
        return view('admin.destination.detail-destination', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);
        // return "hallo";
        return view('admin.destination.edit-destination', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destination = Destination::findOrFail($id);

        // Mendapatkan daftar gambar yang akan dihapus
        $deletedImages = $request->input('deleted_images', []);

        // Menghapus gambar yang dipilih dari array gambar
        $images = json_decode($destination->image, true);

        // Array untuk menyimpan gambar yang akan dipertahankan
        $keptImages = [];

        // Menghapus gambar yang dipilih dan menghapus file dari storage
        foreach ($images as $image) {
            if (!in_array($image, $deletedImages)) {
                $keptImages[] = $image;
            } else {
                Storage::delete('public/destination/' . $image);
            }
        }

        // Menyimpan gambar baru yang diunggah
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = $file->hashName(); // Menghasilkan nama file yang di-hash secara acak
                $file->storeAs('public/destination', $filename); // Menyimpan gambar dengan nama file yang di-hash
                $keptImages[] = $filename; // Menambahkan nama file ke array gambar yang akan dipertahankan
            }
        }

        // Mengupdate array gambar dengan gambar yang dipertahankan
        $destination->image = json_encode($keptImages);

        // $destination->update($request->except(['deleted_images']));
        $destination->save();

        if ($destination) {
            Session::flash('status', 'success');
            Session::flash('message', 'Destination Berhasil di Ubah');
        }

        return redirect()->route('destination.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
