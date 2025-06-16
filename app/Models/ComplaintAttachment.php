<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintAttachment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaint_attachment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'real_name_file',
        'path_file',	
        'type_file',
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

    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }
}