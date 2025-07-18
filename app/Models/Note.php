<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Models
use App\Models\Folder;

class Note extends Model
{
    protected $fillable = [
        'title',
        'context',
        'is_favourite',
        'is_trash',
        'is_archived',
        'folder_id'
    ];

    protected $table = "note";

    public function folder() {
        return $this->belongsTo(Folder::class);
    }
}
