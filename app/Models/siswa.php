<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    public function nisn()
    {
        return $this->hasOne(nisn::class);
    }

    protected $table = 'siswa';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
