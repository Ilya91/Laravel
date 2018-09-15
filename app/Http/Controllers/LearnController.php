<?php

namespace App\Http\Controllers;

use App\Category;
use Redis;

class LearnController extends Controller
{
    public function index()
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            //->take(4)
            ->get();

        $redis = Redis::connection();
        dump($redis->get('key1'));
        return view('learn.learn', [
            'categories' => $categories
            ]
        );
    }
}
