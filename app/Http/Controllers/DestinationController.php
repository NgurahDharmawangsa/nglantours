<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/packages', $image->hashName());

        $packages = Packages::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'max_capacity' => $request->max_capacity
        ]);

        // ...

        return redirect()->route('packages.index');
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

        $deletedImages = $request->input('deleted_images', []);
        $existingImages = $request->input('existing_images', []);
        $images = [];

        // dd($deletedImages);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/destination', $filename);
                $images[] = $filename;
            }
        }

        // Menggabungkan gambar yang ada dengan gambar baru
        $images = array_merge($existingImages, $images);

        $deletedImages = json_decode($destination->image, true);
        $deletedFiles = array_diff($deletedImages, $images);
        // dd($deletedFiles);

        // Menghapus gambar yang dipilih
        foreach ($deletedFiles as $filename) {
            $filePath = 'destination/' . $filename;
            Storage::disk('public')->delete($filePath);
        }

        $destination->image = json_encode($images);

        if ($request->hasFile('image')){
            $destination->save();
        }else{
            $destination->update($request->all());
        }

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
        // Get destination by ID
        $destination = Destination::findOrFail($id);

        // Delete images
        $images = json_decode($destination->image, true);
        foreach ($images as $image) {
            $filePath = 'destination/' . $image;
            Storage::disk('public')->delete($filePath);
        }

        // Delete destination
        $destination->delete();

        // Redirect to index or any other appropriate action
        // return redirect()->route('destination.index');

        // return response()->json(['message' => 'Data berhasil dihapus'], 204);
    }
}
