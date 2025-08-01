<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telechargements extends Model
{
    use HasFactory , SoftDeletes ;

    protected $fillable = [
        'user_id',
        'docs_id',
        'downloaded_at',
    ];
    /**
     * Get the user that owns the telechargement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
