<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaint_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'attachment_path',
        'department_role',
        'response',
        'complaint_title',
        'complaint_content',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];
}
