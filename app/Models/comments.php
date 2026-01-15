<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class comments extends Model
{
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = ['body'];
}
