<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestictedMessageModel extends Model
{
    protected $table = 'banned_message';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['message'];
}
