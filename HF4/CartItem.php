<?php


include "Loader.php";

class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function __construct(Product $product, int $quantity){
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        $this->quantity += 1;
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
    }

    public function decreaseQuantity()
    {
        if($this->quantity > 1)
             $this->quantity-=1;
        else{
            echo 'A mennyiség legalább 1 kell legyen';
        }
    }
}