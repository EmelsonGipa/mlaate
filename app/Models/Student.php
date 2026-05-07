<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StudentController;

class student extends Model
{
    protected $fillable = [
        'name',
        'age',
        'address',
        'email',
        'status'
    ];

        // Get active students only
        public function scopeActive($query)
    {
        return $query->where('status', 'active');
        }
        // Get Gmail students only
        public function scopeGmail($query)
    {
        return $query->where('email', 'like', '%@gmail.com');
        }
}