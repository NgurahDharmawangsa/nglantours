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
}
