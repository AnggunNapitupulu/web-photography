<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCamera extends Model
{
    use HasFactory;
    protected $guard = [];

    protected $fillable = ['camera_id', 'user_id', 'name', 'email', 'phone', 'photo', 'order_date', 'delivery_date'];

    public function _camera(){
        return $this->belongsTo(Camera::class, 'camera_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
