<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Packages;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destination = Destination::get();
        $packages = Packages::get();
        $review = Review::with('user')->get();
        return view('home', compact('destination', 'packages', 'review'));
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
        // $review = Review::get();
        $packages = Packages::with('destination')->findOrFail($id);
        $review = Review::with('user')->where('packages_id', $id)->get();
        return view('client.packages.detail', compact('packages','review'));
    }
}
