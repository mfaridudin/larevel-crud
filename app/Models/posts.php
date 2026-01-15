<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class posts extends Model
{
    public function comments(): MorphMany
    {
        return $this->morphMany(comments::class, 'commentable');
    }

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
