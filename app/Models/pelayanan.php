<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelayanan extends Model
{
    use HasFactory;

    protected $table = "pelayanan";
    protected $primarykey = "id_pelayanan";
    protected $guarded = ['id_pelayanan'];

    public function pasiens(){
        return $this->hasMany(pasien::class);
    }

}
