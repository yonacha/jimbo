<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class TestController extends Controller
{
    public function index()
    {

        return view('test.index');
    }


    public function redis_test(Request $request)
    {
        try {
            $redis = Redis::connect('127.0.0.1', 6379);
            return response('redis working');
        } catch (\Predis\Connection\ConnectionException $e) {
            return response('error connection redis');
        }
    }
}
