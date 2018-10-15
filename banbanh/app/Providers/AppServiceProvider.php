<?php

namespace App\Providers;
use App\ProductType;
use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['header','page.loaisanpham'],function($view){
            $loaisp = ProductType::all();
            $view->with('loaisp',$loaisp);
        });
        
        view()->composer(['header','page.dathang'], function($view) {
            if (Session('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);    
            }
        });

        view()->composer(['header','admin.layout.header'], function ($view){
            $view->with('user_login',\Auth::user());
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
