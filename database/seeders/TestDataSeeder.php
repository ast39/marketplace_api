<?php

namespace Database\Seeders;

use App\Enums\BasicStatusEnum;
use App\Enums\OrderTypeEnum;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderPosition;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_1 = Category::create([
            'parent_id' => null,
            'title'     => 'Техника и электроника',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;

        $id_1_1 = Category::create([
            'parent_id' => $id_1,
            'title'     => 'Смартфоны',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;

        $id_1_2 = Category::create([
            'parent_id' => $id_1,
            'title'     => 'Ноутбуки',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;

        $id_2 = Category::create([
            'parent_id' => null,
            'title'     => 'Мебель',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;

        $id_2_1 = Category::create([
            'parent_id' => $id_2,
            'title'     => 'Диваны',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;

        $id_2_2 = Category::create([
            'parent_id' => $id_2,
            'title'     => 'Шкафы',
            'about'     => null,
            'status'    => BasicStatusEnum::Visible->value,
        ])->category_id;


        $product_1_1_1 = Product::create([
            'category_id' => $id_1_1,
            'title'       => 'iPhone 14',
            'about'       => null,
            'unit'        => 'шт',
            'stock'       => 20,
            'price'       => 74900,
            'options'     => json_encode([
                'memory' => 128,
                'color'  => 'black',
            ], JSON_UNESCAPED_UNICODE),
            'status'      => BasicStatusEnum::Visible->value,
        ])->product_id;

        $product_1_1_2 = Product::create([
            'category_id' => $id_1_1,
            'title'       => 'iPhone 14 pro',
            'about'       => null,
            'unit'        => 'шт',
            'stock'       => 10,
            'price'       => 104900,
            'options'     => json_encode([
                'memory' => 128,
                'color'  => 'gold',
            ], JSON_UNESCAPED_UNICODE),
            'status'      => BasicStatusEnum::Visible->value,
        ])->product_id;

        $product_1_2_1 = Product::create([
            'category_id' => $id_1_2,
            'title'       => 'MacBook Air 13',
            'about'       => null,
            'unit'        => 'шт',
            'stock'       => 12,
            'price'       => 116900,
            'options'     => json_encode([
                'memory' => 16,
                'ssd'    => 256,
            ], JSON_UNESCAPED_UNICODE),
            'status'      => BasicStatusEnum::Visible->value,
        ])->product_id;


        $order_1 = Order::create([
            'owner_id' => 1,
            'about'    => 'Тестовый заказ 1',
            'status'   => OrderTypeEnum::Created->value,
        ])->order_id;

        OrderPosition::create([
            'order_id'   => $order_1,
            'product_id' => $product_1_1_1,
            'price'      => 74900,
            'discount'   => 5000,
            'amount'     => 69900,
        ]);

        OrderPosition::create([
            'order_id'   => $order_1,
            'product_id' => $product_1_1_2,
            'price'      => 104900,
            'discount'   => 0,
            'amount'     => 104900,
        ]);

        $order_2 = Order::create([
            'owner_id' => 1,
            'about'    => 'Тестовый заказ 2',
            'status'   => OrderTypeEnum::Created->value,
        ])->order_id;

        OrderPosition::create([
            'order_id'   => $order_2,
            'product_id' => $product_1_2_1,
            'price'      => 116900,
            'discount'   => 7000,
            'amount'     => 109900,
        ]);

        $order = Order::find($order_1);
        $order->update([
            'status' => OrderTypeEnum::InProcessing->value,
        ]);
        $order->update([
            'status' => OrderTypeEnum::Processed->value,
        ]);
        $order->update([
            'status' => OrderTypeEnum::Paid->value,
        ]);
        $order->update([
            'status' => OrderTypeEnum::Awaiting->value,
        ]);
        $order->update([
            'status' => OrderTypeEnum::Completed->value,
        ]);

        $order = Order::find($order_2);
        $order->update([
            'status' => OrderTypeEnum::InProcessing->value,
        ]);
        $order->update([
            'status' => OrderTypeEnum::Canceled->value,
        ]);

    }
}
