<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    //use HasFactory;
    protected $table = 'settings';
    protected $primaryKey = 'setting_id';
    public $timestamps = false;
    protected $fillable = ['setting_key', 'setting_value'];
}
