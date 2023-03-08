<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\Restaurant;

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

    public function index( $id )
    {
        $recipe = Recipe::find( $id );

        return view('recipe', [
            'recipe' => $recipe
        ]);
    }

    public function create( Request $request )
    {
        $currentUser = Auth::user();

        
        $request->validate([
            'title' => ['required', 'string', 'max:32'],
            // 'rating' => ['required', 'number'],
            // 'description' => ['required', 'string', 'max:255']
        ]);
        
        $recipe = Recipe::create([
            'user_id' => $currentUser->id,
            'listing_id' => $request->listing_id,
            'title' => $request->title,
            'description' => $request->description,
            'public' => false
        ]);
        
        Restaurant::create([
            'name' => $request->name,
            'recipe_id' => $recipe->id,
        ]);
        
        Review::create([
            'recipe_id' => $recipe->id,
            'user_id' => $currentUser->id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('listing', ['id' => $request->listing_id]);

    }

    public function update( Request $request, $id )
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'string', 'max:255']
        ]);

        Recipe::where('id', $id )
        ->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        Restaurant::where('recipe_id', $id )
        ->update([
            'name' => $request->name,
        ]);

        Review::where('recipe_id', $id )
        ->update([
            'rating' => $request->rating,
        ]);

        return redirect()->route('recipe', ['id' => $id]);
    }

    public function edit( $id ) 
    {

        $recipe = Recipe::where( 'id', $id )->first();

        return view('recipe.edit', [
            'recipe' => $recipe
        ]);

    }

    public function delete( $id )
    {
        $recipe = Recipe::find( $id );

        $recipe->delete();

        return redirect()->route('listing', ['id' => $recipe->listing_id]);
    }
}
