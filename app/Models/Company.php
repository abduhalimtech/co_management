<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'director_full_name', 'address',
        'email', 'website', 'phone', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
