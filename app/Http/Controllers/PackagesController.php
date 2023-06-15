<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackagesRequest;
use App\Models\Destination;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Packages::get();
        return view('admin.packages.packages', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destination = Destination::select('id', 'name')->get();
        return view('admin.packages.add-packages', ['destination' => $destination]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackagesRequest $request)
    {
        // $data = $request->all();
        $destination = $request->input('destination', []);

        // upload images
        $image = $request->file('image');
        // dd($image);
        $image->storeAs('public/packages', $image->hashName());

        // $packages = Packages::create($data);
        $packages = Packages::create([
            'image'     => $image->hashName(),
            'name'     => $request->name,
            'start_date'   => $request->start_date,
            'end_date'   => $request->end_date,
            'price'   => $request->price,
            'max_capacity'   => $request->max_capacity
        ]);
        $packages->destination()->sync($destination);

        if ($packages) {
            Session::flash('status', 'success');
            Session::flash('message', 'Destination Berhasil di Tambah');
        }

        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $packages = Packages::with(['destination'])->findOrFail($id);
        // $packages = Destination::with('destination')->where('name', $id)->first();
        return view('admin.packages.detail-packages', ['packages' => $packages]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $packages = Packages::findOrFail($id);
        $destination = Destination::select('id', 'name')->get();
        return view('admin.packages.edit-packages', compact('packages', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $packages = Packages::findOrFail($id);
        // $packages->update($request->all());
        if ($request->hasFile('image')) {
            // upload new image (request dari form)
            $image = $request->file('image');
            $image->storeAs('public/packages', $image->hashName());

            // delete old image
            $filePath = 'packages/' . $packages->image;
            Storage::disk('public')->delete($filePath);
            // Storage::delete('public/packages/' . $packages->image);

            // update packages with new image
            $packages->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'start_date'   => $request->start_date,
                'end_date'   => $request->end_date,
                'price'   => $request->price,
                'max_capacity'   => $request->max_capacity
            ]);
        } else {
            // update packages without image
            $packages->update([
                'name'     => $request->name,
                'start_date'   => $request->start_date,
                'end_date'   => $request->end_date,
                'price'   => $request->price,
                'max_capacity'   => $request->max_capacity
            ]);
        }
        $packages->destination()->sync($request->destination);

        if ($packages) {
            Session::flash('status', 'success');
            Session::flash('message', 'Destination Berhasil di Tambah');
        }
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get post by ID
        $packages = Packages::findOrFail($id);

        // Storage Delete
        $filePath = 'packages/' . $packages->image;
        Storage::disk('public')->delete($filePath);

        // delete post
        $packages->delete();

        // redirect to index
        // return redirect()->route('packages.index');
    }
}
