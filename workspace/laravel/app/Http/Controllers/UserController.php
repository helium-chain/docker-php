<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function show(string $id) {
        dump($id);

        $res = Redis::set("name", $id);

        dump($res);
    }

    public function get1() {
        $res = Redis::get('name');

        dump($res);
    }
}
