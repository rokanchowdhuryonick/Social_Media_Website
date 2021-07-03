<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Member extends Model implements Authenticatable  {
   use HasFactory;
   use Authenticatable;
    public function posts()
    {
        return $this->hasMany(Post::Class);
    }
}
