<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintDepartment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaints_department';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'attachment_id',
        'department_id',
        'complaint_title',
        'complaint_content',
        'proses',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(ComplaintCategory::class, 'category_id', 'id');
    }
    public function attachment()
    {
        return $this->belongsTo(ComplaintAttachment::class, 'attachment_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(ComplaintDepartment::class, 'department_id', 'id');
    }
}
