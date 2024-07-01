<?php

namespace App\Observers;

use App\Models\Shop\Order;
use Illuminate\Support\Facades\Cache;

class ShopOrderObserver
{
    public function created(Order $order): void
    {
        Cache::forget('new_orders_count');
    }

    public function deleted(Order $order): void
    {
        Cache::forget('new_orders_count');
    }

    public function restored(Order $order): void
    {
        Cache::forget('new_orders_count');
    }

    public function forceDeleted(Order $order): void
    {
        Cache::forget('new_orders_count');
    }
}
