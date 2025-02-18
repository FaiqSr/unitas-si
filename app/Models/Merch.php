<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merch extends Model
{
    /** @use HasFactory<\Database\Factories\MerchFactory> */
    use HasFactory;

    protected $table = 'merches';

    protected $fillable = [
        'nama',
        'harga',
        'body',
        'image',
        'stok',
        'slug'
    ];

    protected $casts = [
        'image' => 'array'
    ];

    public function getBodyWithLinksAttribute()
    {
        $body = Str::markdown(e($this->body));

        // Regular expression untuk mendeteksi URL dalam teks
        $body = preg_replace(
            '/(https?:\/\/[^\s]+)/',
            '<a href="$1" class="text-blue-500 target="_blank" rel="noopener noreferrer">$1</a>',
            $body
        );

        return $body;
    } 



}
