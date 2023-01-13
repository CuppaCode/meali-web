<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function restaurant()
    {
        return $this->morphTo();
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
