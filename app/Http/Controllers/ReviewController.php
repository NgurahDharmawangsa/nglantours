<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::get();
        dd($review);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $packagesId = $request->packages_id;

        // Periksa apakah pengguna sudah memberikan review pada data yang sama sebelumnya
        $existingReview = Review::where('user_id', $user->id)
            ->where('packages_id', $packagesId)
            ->exists();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan review pada data ini sebelumnya.'
            ]);
        }

        $review = new Review();
        $review->user_id = $user->id;
        $review->packages_id = $request->packages_id;
        $review->rating = $request->rating;
        $review->review = $request->review;

        $review->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $review
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
