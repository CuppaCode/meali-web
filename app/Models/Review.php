<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function review()
    {
        return $this->morphTo();
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
