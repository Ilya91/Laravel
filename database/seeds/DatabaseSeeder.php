<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Product;
use \App\Category;
use \App\Transaction;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::table('transactions')->truncate();
        DB::table('category_product')->truncate();

        $uq = 200;
        $cq = 30;
        $pq = 1000;
        $tq = 1000;

        factory(User::class, $uq)->create();
        factory(Category::class, $cq)->create();
        factory(Transaction::class, $tq)->create();
        factory(Product::class, $pq)->create()->each(
            function ($product) {
                $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');

                $product->categories()->attach($categories);
            });
    }
}
