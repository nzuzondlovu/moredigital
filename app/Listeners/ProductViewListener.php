<?php

namespace App\Listeners;

use App\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductViewListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Product::where($event->product->id)
        ->update([
            'views' => ($event->product->views + 1)
        ]);
    }
}
