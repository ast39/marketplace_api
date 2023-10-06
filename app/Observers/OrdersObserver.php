<?php

namespace App\Observers;

use App\Enums\OrderTypeEnum;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderPosition;


class OrdersObserver {

    /**
     * @param Order $order
     * @return void
     */
    public function created(Order $order): void
    {
        OrderLog::create([

            'order_id' => $order->order_id,
            'status'   => OrderTypeEnum::Created->value,
        ]);
    }

    /**
     * @param Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        if (!is_null($order->status)) {

            OrderLog::create([

                'order_id' => $order->order_id,
                'status'   => $order->status,
            ]);
        }
    }

    /**
     * @param Order $order
     * @return void
     */
    public function deleted(Order $order): void
    {
        OrderLog::where('order_id', $order->order_id)
            ->delete();

        OrderPosition::where('order_id', $order->order_id)
            ->delete();
    }
}
