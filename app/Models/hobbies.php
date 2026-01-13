<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hobbies extends Model
{
    protected $table = 'hobbies';

    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
    ];
}
