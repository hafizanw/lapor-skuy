<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';
    protected $fillable = [
        'user_id',
        'category_id',
        'attachment_id',
        'complaint_title',
        'complaint_content',
        'proses',
        'created_at',
        'updated_at',
    ];
}
