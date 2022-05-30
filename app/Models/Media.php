<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    // protected $table = "media";
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this-> belongsToMany(User::class,'media_user', 'media_id', 'user_id');
    }
    public function media_user()
    {
        // return $this->belongsTo(User::class);
        return $this-> belongsToMany(User::class,'media_user', 'media_id', 'user_id');
    }
    // function media_user()
    
    // {
    //     return $this->hasMany(media_user::class);
    // }

    public function post()
    {

        return $this->hasmany(Post::class);
    }
    public function mata_kuliahs()
    {

        return $this->hasmany(mata_kuliah::class);
    }
}
