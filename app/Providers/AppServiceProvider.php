<?php

namespace App\Providers;

//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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
        Paginator::useBootstrap(); // 

        Collection::macro('toUpper', function() {
            return $this->map(function ($items) {
                return strtoupper($items);
            });
        });

        Response::macro('success', function ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        });

        Str::macro('prefixHello', function ($value) {
            return 'Hello ' . $value;
        });

        Arr::macro('removeNulls', function ($array) {
            return array_filter($array, fn($item) => !is_null($item));
        });
        
    }


}
