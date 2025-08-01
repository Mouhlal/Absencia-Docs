<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matieres extends Model
{
    use HasFactory , SoftDeletes ;
    protected $fillable = [
        'name',
        'nv_scolaires_id',
        'description',
    ];
    /**
     * Get the docs associated with the matiere.
     */
    public function docs()
    {
        return $this->hasMany(Docs::class);
    }
}
