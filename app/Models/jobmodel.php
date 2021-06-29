<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobmodel extends Model
{
    use HasFactory;
    protected $table = "job";
    protected $primaryKey = "id ";
    public $timestamps = false;
}
