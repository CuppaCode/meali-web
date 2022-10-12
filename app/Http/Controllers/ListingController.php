<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the listings
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $listings = Listing::all();

        return view('listing', [
            'listings' => $listings
        ]);
    }
}
