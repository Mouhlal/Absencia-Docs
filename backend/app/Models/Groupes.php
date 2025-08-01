<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'nv_scolaires',
    ];
    /**
     * Get the users associated with the group.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groupe', 'groupe_id', 'user_id');
    }

}
