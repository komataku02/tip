<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリーを作成
        $categories = Category::factory(5)->create(); // 5つのカテゴリーを作成

        // 各カテゴリーに対して商品を作成
        $categories->each(function ($category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
            ])->each(function ($product) {
                // 商品ごとに画像を追加
                ProductImage::factory(3)->create([
                    'product_id' => $product->id,
                ]);
            });
        });
    }
}
