<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_group extends Model
{
    use HasFactory;
    protected $table="create_groups";
    protected $primaryKey="id";
    public $timestamps=false;
}
