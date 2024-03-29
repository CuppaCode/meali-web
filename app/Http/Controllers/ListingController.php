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
     * Show one listing
     *
     * @return \Illuminate\View\View
     */
    public function index( $id )
    {
        $listing = Listing::find( $id );

        $this->authorize('view', $listing);

        return view('listing', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the listings
     *
     * @return \Illuminate\View\View
     */
    public function collection()
    {
        $currentUser = Auth::user();

        $listings = Listing::where('user_id', $currentUser->id)->get();

        return view('listings', [
            'listings' => $listings
        ]);
    }

    public function create( Request $request )
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'string', 'max:255']
        ]);

        $currentUser = Auth::user();

        $listing = Listing::create([
            'user_id' => $currentUser->id,
            'title' => $request->title,
            'description' => $request->description,
            'public' => false
        ]);

        return redirect()->route('listings')->with('success', "Succesfully created listing: {$listing->title}!");

    }

    public function update( Request $request, $id )
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'description' => ['no', 'string', 'max:255']
        ]);

        $listing = Listing::where('id', $id )->first();

        Listing::where('id', $id )
        ->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('listing', ['id' => $id])->with('success', "Succesfully updated listing: {$listing->title}!");
    }

    public function edit ( $id ) 
    {
        $listing = Listing::where('id', $id )->first();

        $this->authorize('view', $listing);

        return view('listing.edit', [
            'listing' => $listing
        ]);

    }

    public function delete( $id )
    {
        $listing = Listing::find( $id );

        $this->authorize('delete', $listing);

        $listing->delete();

        return redirect()->route('listings')->with('success', "Succesfully deleted {$listing->title}!");
    }
}
