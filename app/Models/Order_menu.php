<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'harga',
        'quantity',
        'order_id',
        'menu_id',
    ];


        public function order()
        {
            return $this->belongsTo(Order::class);
        }

        public function menu()
        {
            return $this->belongsTo(Menu::class);
        }


}
