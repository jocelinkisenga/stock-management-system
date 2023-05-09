<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cardcontents extends Component
{
    protected $listeners = ["added" => "render"];
    public $cardContents;
    public $quantity;


    public $total;
    public function render()
    {
        $this->cardContents = \CartFacade::getContent();
        $this->total = \CartFacade::getTotal();
        return view('livewire.cardcontents');
    }

    public function modify(int $id){
       

        \CartFacade::update($id,[
            "quantity" => $this->quantity
        ]);
        $this->emptyQuantity();
    }

    private  function emptyQuantity(){
        $this->quantity = " ";
    }


}
