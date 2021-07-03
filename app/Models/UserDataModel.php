<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDataModel extends Model
{
    protected $table = 'user_data';
    protected $primaryKey = 'user_data_id';
    public $timestamps = false;
    protected $fillable = ['login_id', 'name', 'dob', 'gender', 'address', 'country_id', 'phone', 'about_me', 'profile_photo', 'cover_photo', 'user_cv'];
}
