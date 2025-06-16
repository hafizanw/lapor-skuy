<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintVote extends Model
{
    protected $table = 'complaint_vote';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'complaint_id',
        'vote_type', // 'upvote' or 'downvote'
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
    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }
}
