<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Review;
use App\Models\Restaurant;
use App\Models\Image;

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

        $this->authorize('view', $recipe);

        return view('recipe', [
            'recipe' => $recipe
        ]);
    }

    public function create( Request $request )
    {
        $currentUser = Auth::user();
        
        $request->validate([
            'title' => ['required', 'string', 'max:32'],
            'rating' => ['required'],
            'description' => ['string', 'max:255'],
            'image' => ['image']
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

        if($request->file('image')){

            //Image work
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = '/storage/'.$request->file('image')->storeAs('images', $fileName, 'public');

            Image::create([
                'url' => $path,
                'imageable_id' => $recipe->id,
                'imageable_type' => 'App\Models\Recipe'
            ]);
            
        }

        return redirect()->route('listing', ['id' => $request->listing_id])->with('success', "Succesfully created recipe: {$recipe->title}!");

    }

    public function update( Request $request, $id )
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'string', 'max:255']
        ]);

        $recipe = Recipe::where( 'id', $id )->first();

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

        return redirect()->route('recipe', ['id' => $id])->with('success', "Succesfully updated recipe: {$recipe->title}!");
    }

    public function edit( $id ) 
    {

        $recipe = Recipe::where( 'id', $id )->first();

        $this->authorize('view', $recipe);

        return view('recipe.edit', [
            'recipe' => $recipe
        ]);

    }

    public function delete( $id )
    {
        $recipe = Recipe::find( $id );

        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect()->route('listing', ['id' => $recipe->listing_id])->with('success', "Succesfully deleted recipe: {$recipe->title}!");
    }
}
