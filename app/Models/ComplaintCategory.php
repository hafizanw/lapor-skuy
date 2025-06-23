<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaint_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visibility_type',
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

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'category_id', 'id');
    }

}
