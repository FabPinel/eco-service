<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\DIY;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $products = Product::all();
        $categories = Category::all();
        $discounts = Discount::all();
        $diy = DIY::paginate(8);
        $productsHome = Product::paginate(5);
        $diyHome = DIY::paginate(3);
        View::share('products', $products);
        View::share('categories', $categories);
        View::share('productsHome', $productsHome);
        View::share('diy', $diy);
        View::share('diyHome', $diyHome);
    }
}
