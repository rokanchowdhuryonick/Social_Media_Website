<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobmodel extends Model
{
    use HasFactory;
    protected $table = "jobs";
    protected $primaryKey = "id ";
    public $timestamps = false;
}
