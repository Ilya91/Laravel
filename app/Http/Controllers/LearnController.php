<?php

namespace App\Http\Controllers;

use App\Category;

class LearnController extends Controller
{
    public function index()
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            //->take(4)
            ->get();

        return view('learn.learn', [
            'categories' => $categories
            ]
        );
    }
}
