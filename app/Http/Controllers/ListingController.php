<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

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
        $currentUser = Auth::user();

        $listings = Listing::where('user_id', $currentUser->id)->get();

        return view('listing', [
            'listings' => $listings
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $currentUser = Auth::user();

        Listing::create([
            'user_id' => $currentUser->id,
            'title' => $request->title,
            'description' => $request->description,
            'public' => false
        ]);

        return redirect()->route('listing');

    }

    public function delete($id)
    {
        $listing = Listing::find($id);

        $listing->delete();

        return redirect()->route('listing');
    }
}
