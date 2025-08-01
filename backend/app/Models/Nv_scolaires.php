<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nv_scolaires extends Model
{
    protected $table = 'nv_scolaires';

    protected $fillable = [
        'name',
        'description',
    ];

    public function groupes()
    {
        return $this->hasMany(Groupes::class, 'nv_scolaires');
    }
}
