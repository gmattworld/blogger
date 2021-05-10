<?php

namespace Gmattworld\Blogger\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $incrementing = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
