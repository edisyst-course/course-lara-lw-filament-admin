<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['product_id', 'title', 'slug', 'content', 'is_published'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
