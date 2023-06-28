<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $booking = Booking::with('packages')->whereHas('packages', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('client.booking.history-booking', compact('booking'));

        // return view('client.booking.booking', compact('booking'));
        // dd($booking);
        // $booking = Booking::with('packages')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        // $packages = Booking::create([
        //     'user_id'   => $user->id,
        //     'name'     => $request->name,
        //     'number'   => $request->number,
        //     'booking_date'   => $request->booking_date,
        //     'participants'   => $request->participants,
        //     'total_price'   => $request->total_price,
        //     'payment_proof'   => $request->payment_proof,
        //     'payment_method'   => $request->payment_method,
        //     'status'   => "pending"
        // ]);

        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $image->storeAs('public/booking', $image->hashName());

            $booking = new Booking();
            $booking->user_id = $user->id;
            $booking->packages_id = $request->packages_id;
            $booking->name = $request->name;
            $booking->number = $request->number;
            $booking->booking_date = $request->booking_date;
            $booking->participants = $request->participants;
            $booking->total_price = $request->total_price;
            $booking->payment_proof = $image->hashName();
            $booking->payment_method = $request->payment_method;
            $booking->status = "pending";
        } else {
            $booking = new Booking();
            $booking->user_id = $user->id;
            $booking->packages_id = $request->packages_id;
            $booking->name = $request->name;
            $booking->number = $request->number;
            $booking->booking_date = $request->booking_date;
            $booking->participants = $request->participants;
            $booking->total_price = $request->total_price;
            $booking->payment_method = $request->payment_method;
            $booking->status = "pending";
        }
        // dd($booking);

        $booking->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $packages = Packages::findOrFail($id);
        $booking = Booking::get();
        return view('client.booking.booking', compact('booking', 'packages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.edit-booking', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = $request->input('status');
        $booking->save();

        if ($booking) {
            Session::flash('status', 'success');
            Session::flash('message', 'Status Berhasil di Ubah');
        }

        return redirect('/booking-admin');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get post by ID
        $booking = Booking::findOrFail($id);

        // Storage Delete
        $filePath = 'booking/' . $booking->payment_proof;
        Storage::disk('public')->delete($filePath);

        // delete post
        $booking->delete();
    }

    public function indexAdmin()
    {
        $booking = Booking::get();
        return view('admin.booking.booking', compact('booking'));
    }

    public function getDetail($id)
    {
        $booking = Booking::find($id);

        return response()->json($booking);
    }
}
