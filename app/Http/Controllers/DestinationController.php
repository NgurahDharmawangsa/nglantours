<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

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
    public function store(Request $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
