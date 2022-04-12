<?php 
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Cart extends Model
    {
        public $items = [];
        public $totalPrice = 0;
        public $totalQuantity = 0;
        public $totalItem = 0;

        public function __construct(){
            $this->items = session('cart') ? session('cart') : [];
            $this->totalPrice = $this->getTotalPrice();
            $this->totalQuantity = $this->getTotalQuantity();
            $this->totalItem = $this->getTotalItem();
        }

        public function removeItem($id)
        {
            if(isset($this->items[$id])){
                unset($this->items[$id]);
                session(['cart' => $this->items]);
            }
        }

        public function clear()
        {
            session()->forget('cart');
        }
        public function updateItem($id,$quantity)
        {
            if(isset($this->items[$id])){
                $this->items[$id]['quantity'] = $quantity > 0 ? ceil($quantity) : 1;
                session(['cart' => $this->items]);
            }
        }


        public function setItem($pro)
        {
            if(isset($this->items[$pro->id])){
                $this->items[$pro->id]['quantity'] += 1;
            }else{
                $item = [
                    'id' => $pro->id,
                    'name' => $pro->name,
                    'image' => $pro->image,
                    'price' => $pro->sale_price > 0 ? $pro->sale_price : $pro->price,
                    'quantity' => 1
                ];
                $this->items[$pro->id] = $item;
            }
            session(['cart' => $this->items]);
            
        }

        private function getTotalPrice()
        {
            $total = 0;
            foreach ($this->items as $item){
                $total += $item['quantity'] * $item['price'];
            }
            return $total;
        }

        private function getTotalItem()
        {
            $total = 0;
            foreach ($this->items as $item){
               $total =  count( $this->items);
            }
            return $total;
        }

        private function getTotalQuantity()
        {
            $total = 0;
            foreach ($this->items as $item){
                $total += $item['quantity'];
            }
            return $total;
        }


    }
?>