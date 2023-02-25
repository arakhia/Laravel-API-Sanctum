<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'date_of_birth',
        'major',
        'address',
        'status'
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
