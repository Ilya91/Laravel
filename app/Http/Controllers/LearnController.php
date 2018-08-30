<?php

namespace App\Http\Controllers;

use App\Category;

class LearnController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('learn.learn', [
            'categories' => $categories
            ]
        );
    }
}
