<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    function media()
    {
        return $this->hasMany(Media::class);
        // return $this->belongsToMany(Media::class,'media_user', 'media_id', 'user_id');
    }
    function user_media()
    
    {
        return $this->belongsToMany(Media::class,'media_user', 'media_id', 'user_id');
    }

    function mata_kuliah()
    {
        return $this->hasMany(mata_kuliah::class);
    }
    // function alldata()
    // {
    //     return DB::table('users')
    //     ->leftJoin('media', 'media.id', '=', 'media.id')
    //     ->get();
    // }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'email',
        'NPM',
        'password',
        'role',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
