<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;

class Buttonbuy extends Component
{
    public int $product_id;

    public function render()
    {
        return view('livewire.buttonbuy');
    }

    public function add(int $id)
    {
        $product = Produit::find($id);
        $cartItem = \CartFacade::get($product->id);
        if(empty($cartItem)){
            \CartFacade::add([
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
            ]);
            $this->emit("added");
        }
        else{
            dd("product already exists");
        }
    }
}
