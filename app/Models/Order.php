<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id', 'user_id', 'total_price', 'status', 'table_id'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
