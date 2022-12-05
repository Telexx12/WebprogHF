<?php
require_once 'CartItem.php';

class Cart
{

    /**
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }



    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {

        $new_cartItem = new CartItem($product,$quantity);


        if(in_array($new_cartItem,$this->items)){
            $this->items[array_search($new_cartItem,$this->items)]->setQuantity($this->items[array_search($new_cartItem,$this->items)]->getQuantity() + $quantity);
        }else{
            array_push($this->items,$new_cartItem);
        }


        return $new_cartItem;

    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        
        unset($this->items[$product->getId()]);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $szam = 0; 
        foreach($this->items as $item){
            $szam += $item->getQuantity();
        }
        return $szam;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $ossz_ar = 0;
        foreach ($this->items as $key=>$value){
            $ossz_ar += $value->getQuantity() * $value->getProduct()->getPrice();

        }
        return $ossz_ar;
    }
}