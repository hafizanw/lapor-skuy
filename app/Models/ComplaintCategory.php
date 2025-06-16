<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    protected $table = 'complaint_category';
    protected $fillable = [
        'description',
        'visibility_type',
        'created_at',
        'updated_at',
    ];
}
