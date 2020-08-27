<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testTemporaryCartControllerStoreMethod(){
        $response = $this->call('POST','/temporary/cart',[1,1]);

    }
}
