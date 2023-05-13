<?php

namespace App\Http\Repositorie;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderRepository {

    public function storeOrder(){

        $code = time()."ABC";

        $order = Order::create([
            'code' => $code,
            'total_price' => \CartFacade::getTotal(),
            'total_products' => \CartFacade::getTotalQuantity()

        ]);

     $this->storeOrderDetails($order->id);


    }

    private function storeOrderDetails($order_id){
        $contents = \CartFacade::getContent();
        try {

                foreach($contents as $content){
                    OrderDetails::create([
                        'order_id'=>$order_id,
                        'product_id'=> $content['id'],
                        'product_quantity' => $content['quantity'],
                    ]);
                }



        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
