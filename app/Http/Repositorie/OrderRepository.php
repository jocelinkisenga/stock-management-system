<?php

namespace App\Http\Repositorie;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Produit;

class OrderRepository
{

    public function storeOrder()
    {

        $code = time() . "ABC";

        $order = Order::create([
            "user_id" => \Auth::user()->id,
            'code' => $code,
            'total_price' => \CartFacade::getTotal(),
            'total_products' => \CartFacade::getTotalQuantity()

        ]);

        $this->storeOrderDetails($order->id);


    }

    private function storeOrderDetails($order_id)
    {
        $contents = \CartFacade::getContent();
        try {

            foreach ($contents as $content) {
                OrderDetails::create([
                    'order_id' => $order_id,
                    'product_id' => $content['id'],
                    'product_quantity' => $content['quantity'],
                ]);

                $this->substract_quantity($content['id'],$content['quantity']);
            }



        } catch (\Throwable $th) {
            throw $th;
        }

        \CartFacade::clear();

    }


    private function substract_quantity($productId, $quantity)
    {
        $result = Produit::where('id', '=', $productId)->first();
        if (!empty($result)) {
            $qty = $result->quantity;
            if ($qty >= $quantity) {
                $new_qty = $qty - $quantity;

                $result->update([
                    "quantity" => $new_qty
                ]);
            }
        }
    }

}
