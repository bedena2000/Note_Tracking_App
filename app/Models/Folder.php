<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\Models\User;
use App\Models\Note;

class Folder extends Model
{
    protected $table = "folder";

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }
    

}
