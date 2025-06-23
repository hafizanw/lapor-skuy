<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
        'question',
        'answer',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
