<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    const AVAILABLE_PRODUCT = "avalaible";
    const UNAVAILABLE_PRODUCT = "unavalaible";

    protected $date = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
        'category_id',
    ];


    public function isAvailable() {
        if($this->status == Product::AVAILABLE_PRODUCT) {
            return true;
        }
        
        return false;
    }


    public function sellers() {
        return $this->belongsTo(Seller::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
