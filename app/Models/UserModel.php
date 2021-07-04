<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    public $timestamps = false;
    protected $fillable = ['email', 'password', 'registration_datetime', 'last_login_datetime', 'active', 'user_type'];
}
