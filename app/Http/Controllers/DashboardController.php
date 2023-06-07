<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Packages;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function count()
    {
        $destination = Destination::count();
        $packages = Packages::count();
        return view('admin.index', compact('destination', 'packages'));
    }   
}
