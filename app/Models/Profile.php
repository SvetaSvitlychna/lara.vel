<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected  $fillables =[
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'location',
        'bio'
    ];
    public function getFullNameAttribute()
    {
        return $this->last_name." ".$this->first_name;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
