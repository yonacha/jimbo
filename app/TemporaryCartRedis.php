<?php

namespace App;


class TemporaryCartRedis
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @return array[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @param array[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

protected $id,$sum,$products = array(array());


}
