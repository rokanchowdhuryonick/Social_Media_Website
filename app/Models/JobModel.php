<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobModel extends Model
{
    protected $table = 'job_data';
    protected $primaryKey = 'job_id';
    public $timestamps = false;
    protected $fillable = ['company_id', 'job_title', 'job_description', 'salary', 'job_type', 'vacancy', 'created_at', 'expire_datetime'];
}
