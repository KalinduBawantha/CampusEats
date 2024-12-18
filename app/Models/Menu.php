<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'menuid';

    protected $fillable = [
        'restid', 'image', 'name', 'price',
    ];

    public function restaurant()
    {
        return $this->belongsTo(User::class, 'restid')->where('client', 'restaurant');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'menuid');
    }
}
