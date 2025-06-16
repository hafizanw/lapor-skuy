<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'complaint_id',
        'user_id',
        'description',
        'created_at',
        'updated_at',
    ];
}
