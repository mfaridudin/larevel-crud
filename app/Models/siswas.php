<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    public function phone_numbers()
    {
        return $this->hasMany(phone_numbers::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(hobbies::class, 'hobby_siswa', 'siswa_id', 'hobby_id');
    }

    protected $table = 'siswas';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
