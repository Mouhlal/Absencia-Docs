<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docs extends Model
{
    use SoftDeletes , HasFactory;

    protected $fillable = [
        'title',
        'content',
        'file_path',
        'type',
        'user_id',
        'groupe_id',
        'matiere_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
