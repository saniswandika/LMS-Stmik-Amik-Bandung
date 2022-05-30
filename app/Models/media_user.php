<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media_user extends Model
{
    use HasFactory;
    protected $table = "media_user";
    public function user()
    {

        return $this-> belongsTo(User::class);
    }
}
