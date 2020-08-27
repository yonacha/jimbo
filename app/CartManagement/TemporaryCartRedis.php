<?php


namespace App\CartManagement;



use Predis\Client;

class TemporaryCartRedis implements TemporaryCartContract
{
    protected $redis,$preposition,$sessionToken;

    function __construct()
    {
        $this->redis = new Client();
        $this->sessionToken = session()->get("_token");

        $this->preposition = 'cart:' . $this->sessionToken;

    }

    public function addToCart($data){
        if($this->redis->exists($this->preposition)){
            if($this->redis->exists($this->preposition . ':product:' . $data['product_id'])){

                $this->redis->incrby($this->preposition . ':product:' . $data['product_id'] . ':quantity',$data['quantity']);
                $this->redis->expire($this->preposition,3600);

            } else {
                $this->redis->set($this->preposition . ':product:' . $data['product_id'], $data['product_id']);
                $this->redis->set($this->preposition . ':product:' . $data['product_id'] . ':quantity', $data['quantity']);
                $this->redis->expire($this->preposition,3600);
            }
        } else {
            $this->redis->setex($this->preposition, 3600 , $this->sessionToken);
            $this->redis->set($this->preposition . ':product:' . $data['product_id'], $data['product_id']);
            $this->redis->set($this->preposition . ':product:' . $data['product_id'] . ':quantity', $data['quantity']);
        }
        echo($this->redis->get($this->preposition . ':product:' . $data['product_id'] . ':quantity'));
    }

    public function removeFromCart($data){
        if($this->redis->get($this->preposition . ':product:' . $data['product_id'] . ':quantity') > $data['quantity']){
            $this->redis->decrby($this->preposition . ':product:' . $data['product_id'] . ':quantity',$data['quantity']);
        } else {
            $this->redis->del([$this->preposition . ':product:' . $data['product_id']]);
        }
    }

    public function getCartItems()
    {
        // TODO: Implement getCartItems() method.
    }
}
