<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model
{
    use HasFactory;
    protected $table = 'delivery_options';

    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_delivery_options');
    }
}