<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */


    protected $table = 'members';
    protected $fillable = [
        'name',
        'jabatan',
        'NPM',
        'email',
        'motivasi',
        'ulangTahun',
        'sosialMedia',
        'profilePicture'
    ];

    protected $casts = [
        'sosialMedia' => 'array',
        'profilePicture' => 'array'
    ];
    
    
    use HasFactory;
}
