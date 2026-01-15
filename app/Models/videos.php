<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class videos extends Model
{
    public function comments(): MorphMany
    {
        return $this->morphMany(comments::class, 'commentable');
    }

    protected $table = 'videos';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
