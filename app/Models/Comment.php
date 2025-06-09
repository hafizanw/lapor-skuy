<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'Comment';
    protected $fillable = [
        'Complaint_ID',
        'User_ID',
        'Description',
        'created_at',
        'updated_at',
    ];
}
