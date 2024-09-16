<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutApp extends Model
{
    use HasFactory;

    protected $table = 'about_app';

    protected $fillable = [
        'title',
        'description',
        'contact_email',
        'contact_phone',
        'contact_address',
    ];
}
