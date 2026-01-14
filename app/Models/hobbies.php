<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hobbies extends Model
{
    public function siswas()
    {
        return $this->belongsToMany(siswas::class, 'hobby_siswa', 'hobby_id', 'siswa_id');
    }

    protected $table = 'hobbies';

    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
    ];
}
