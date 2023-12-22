<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'menu_id',
    ];
    public function menu()
        {
            return $this->belongsTo(Menu::class);
        }

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
