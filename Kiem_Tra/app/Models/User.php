<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['username', 'email', 'password', 'fullname'];

    // Thiết lập quan hệ 1-N: Một User có nhiều Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
