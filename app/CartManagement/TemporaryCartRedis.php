<?php


namespace App\CartManagement;



use Predis\Client;
use Predis\Collection\Iterator;

class TemporaryCartRedis implements TemporaryCartContract
{
    protected $redis,$preposition,$sessionToken,$sessionTokenRequest,$prepositionRequest;

    function __construct($sessionKey)
    {
        $this->redis = new Client();
        $this->sessionTokenRequest = $sessionKey;

        $this->sessionToken = session()->get('_token');
        $this->preposition = 'cart:' . $this->sessionToken;
        $this->prepositionRequest = 'cart:' . $this->sessionTokenRequest;

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
        $result = array();
        foreach(new Iterator\Keyspace($this->redis,$this->prepositionRequest . ':product:*[0-9]') as $key) {
            $productId = $this->redis->get($key);
            $quantity = $this->redis->get($key . ':quantity');
            $push = ['product_id' => $productId,
                'quantity' => $quantity];
            array_push($result,$push);
        }

        return $result;
    }
}
