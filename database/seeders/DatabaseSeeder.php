<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        User::factory()->count(1000)->create();
        Category::factory()->count(30)->create();
        Product::factory()->count(1000)->create()->each(
            function($product) {
                $categories = Category::all()->random(mt_rand(1, 10))->pluck('id');
                $product->categories()->attach($categories);
            }
        );

        Transaction::factory()->count(50)->create();
    }
}
