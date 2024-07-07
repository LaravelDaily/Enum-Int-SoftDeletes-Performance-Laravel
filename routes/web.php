<?php

use App\Livewire\Form;
use App\Models\Shop\Order;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Route;

Route::get('form', Form::class);

Route::get('benchmark', function () {
    Benchmark::dd([
        'Enum' => fn () => Order::where('status', 'new')->count(),
        'Bigint' => fn () => Order::where('status_id', 1)->count(),
        'Tinyint' => fn () => Order::where('tiny_status_id', 1)->count(),
        'No FK' => fn () => Order::where('status_number', 1)->count(),
    ], 10);
});
