<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    protected $guard = [];

    protected $fillable = ['camera', 'photo', 'camera', 'description'];
    
    public function _orderCameras(){
        return $this->hasMany(OrderCamera::class, 'camera_id', 'id');
    }
}
