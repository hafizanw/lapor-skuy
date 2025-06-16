<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintAttachment extends Model
{
    protected $table = 'complaint_attachment';
    protected $fillable = [
        'real_name_file',
        'path_file',
        'type_file',
        'created_at',
        'updated_at',
    ];
}
