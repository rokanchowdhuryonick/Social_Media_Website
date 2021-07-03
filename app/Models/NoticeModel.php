<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
    protected $primaryKey = 'notice_id';
    public $timestamps = false;
    protected $fillable = ['notice_title', 'notice_text', 'notice_for', 'created_at'];
}
