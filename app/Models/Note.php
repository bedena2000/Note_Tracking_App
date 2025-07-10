<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Models
use App\Models\Folder;

class Note extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_favourite',
        'is_trash',
        'is_archived'
    ];

    public function folder() {
        return $this->belongsTo(Folder::class);
    }
}
