<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "pesan";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function show_name($user)
    {
        return User::where("id", $user)->get();
    }
}
