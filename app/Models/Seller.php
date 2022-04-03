<?php

namespace App\Models;

use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        parent::addGlobalScope(new SellerScope);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
