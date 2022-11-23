<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = [
        'small_pict',
        'medium_pict',
        'large_pict',
        'original_pict',
        'picture_queue_no',
    ];

    public function getOriginalPicture() {
        $path = "storage/post_image/{$this->picture}";
        return asset($path);
    }
}
