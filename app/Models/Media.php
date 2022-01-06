<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Media extends Model
{
    protected $primaryKey = 'id_media';
    use HasFactory;

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
