<?php

namespace App\Http\Controllers\Realtime;

use App\Category;
use App\Concert;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function index() :string
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            ->get();

        return view('learn.learn', [
                'categories' => $categories
            ]
        );
    }

    public function ajaxCategories()
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            ->get();
        return $categories;
    }
}
