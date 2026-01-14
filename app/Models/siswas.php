<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    public function phone_numbers()
    {
        return $this->hasMany(phone_numbers::class);
    }

    protected $table = 'siswas';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
