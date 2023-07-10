<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function gallery()
    {
        return $this->belongsTo(CatGallery::class, 'cat_gallery_id', 'id');
    }
}