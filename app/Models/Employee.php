<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'passport', 'last_name', 'first_name', 'middle_name',
        'position', 'phone', 'address', 'company_id'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
