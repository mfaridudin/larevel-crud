<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phone_numbers extends Model
{
    public function siswas()
    {
        return $this->belongsTo(siswas::class);
    }

    protected $table = 'phone_numbers';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
