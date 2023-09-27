<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wish_lists';
    protected $fillable  = [
        'user_id',
        'prod_d',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
