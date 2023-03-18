<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
    * Get the parent imageable model (Recipe or Something else).
    */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
