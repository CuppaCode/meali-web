<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecipeController extends Controller
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

    public function create( Request $request )
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        $currentUser = Auth::user();

        Recipe::create([
            'user_id' => $currentUser->id,
            'listing_id' => $request->listing_id,
            'restaurant_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
            'public' => false
        ]);

        return redirect()->route('listing', ['id' => $request->listing_id ]);

    }
}
