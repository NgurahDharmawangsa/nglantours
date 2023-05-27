<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Packages;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $data = $request->all();
        $destination = $request->input('destination', []);
        $packages = Packages::create($data);
        $packages->destination()->sync($destination);
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
        $packages->update($request->all());
        $packages->destination()->sync($request->destination);
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
