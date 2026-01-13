<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nisn extends Model
{
    public function Siswa()
    {
        return $this->belongsTo(siswa::class);
    }

    protected $table = 'nisn';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
