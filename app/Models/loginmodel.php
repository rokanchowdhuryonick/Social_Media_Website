<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginmodel extends Model
{
  protected $table="users";
  protected $primarykey="id";
  public $timestamps =false;
}
