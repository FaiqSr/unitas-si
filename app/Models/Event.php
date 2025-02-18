<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{

    protected $table = 'events';
    
    protected $fillable = [
        'judul',
        'slug',
        'category_id',
        'body',
        'status',
        'tglPelaksanaan',
        'image'
    ];

    protected $casts = [
        'image' => 'array'
    ];

    public function getBodyWithLinksAttribute()
    {
        $body = e($this->body);

        // Regular expression untuk mendeteksi URL dalam teks
        $body = preg_replace(
            '/(https?:\/\/[^\s]+)/',
            '<a href="$1" class="text-blue-500 target="_blank" rel="noopener noreferrer">$1</a>',
            $body
        );

        // $body = Str::markdown($body);

        return $body;
    } 


    use HasFactory;
    

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
