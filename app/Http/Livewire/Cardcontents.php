<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cardcontents extends Component
{
    protected $listeners = ["added" => "render"];
    public $cardContents;
    public $quantity;
    public $input_quantity;


    public $total;
    public function render()
    {
        $this->cardContents = \CartFacade::getContent();
        $this->total = \CartFacade::getTotal();
        return view('livewire.cardcontents');
    }

    public function plus(int $id){
        \CartFacade::update($id,[
            "quantity" => $this->quantity+1
        ]);
    }

    public function addQuantity(int $id){


        \CartFacade::update($id,[
            "quantity" => $this->input_quantity
        ]);
        $this->emptyQuantity();
    }

        public function delete(int $id){

        \CartFacade::remove($id);
        $this->cardContents = \CartFacade::getContent();
        $this->emit("removed");

    }

    private  function emptyQuantity(){
        $this->quantity = " ";
    }


}
