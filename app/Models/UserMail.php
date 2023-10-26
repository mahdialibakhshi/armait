<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "usermails";

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
