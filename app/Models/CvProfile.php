<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvProfile extends Model
{
    protected $fillable = [
        'name', 'professional_title', 'email', 'phone', 'address',
        'about', 'education', 'skills', 'experience', 'reference', 'photo',
    ];
}
