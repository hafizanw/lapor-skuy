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
    public function votes()
    {
        return $this->hasMany(ComplaintVote::class, 'complaint_id', 'id');
    }
    public function getVoteCountAttribute()
    {
        return $this->votes->count();
    }
}

