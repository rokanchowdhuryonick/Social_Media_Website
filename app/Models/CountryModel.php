<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    //use HasFactory;
    protected $table = 'country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
    protected $fillable = ['country_name', 'status'];
}
