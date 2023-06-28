<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Packages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destination = Destination::get();
        $packages = Packages::get();
        return view('home', compact('destination', 'packages'));
    }

    public function destination()
    {
        $destination = Destination::get();
        return view('client.destination.destination', compact('destination'));
    }

    public function showDestination(string $id)
    {
        $destination = Destination::with('packages')->where('name', '=', $id)->first();
        return view('client.destination.detail', compact('destination'));
    }

    public function packages()
    {
        $packages = Packages::get();
        return view('client.packages.packages', compact('packages'));
    }

    public function showPackages($id)
    {
        $packages = Packages::with('destination')->findOrFail($id);
        return view('client.packages.detail', compact('packages'));
    }
}
