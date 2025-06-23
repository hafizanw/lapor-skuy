<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone_number',
        'role',
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

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'department_id', 'id');
    // }
    public function complaintDepartment()
    {
        return $this->hasMany(ComplaintDepartment::class, 'department_id', 'id');
    }
}
