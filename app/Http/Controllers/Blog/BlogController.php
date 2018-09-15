<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use Redis;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        $storage = Redis::connection();

        $popular = $storage->zrevrange('articleViews', 0, -1);

        foreach ($popular as $item) {
            $id = str_replace('article:', '', $item);
            echo 'article id: ' . $id . '<br>';
        }
    }

    public function article( $id ) :string
    {
        $storage = Redis::connection();

        if ($storage->zscore('articleViews', 'article:' . $id)){

            $storage->pipeline(function ($pipe) use ($id){
                $pipe->zincrby('articleViews', 1, 'article:' . $id);
                $pipe->incr('article:' . $id. ':views');
            });

        }else{
            $views = $storage->get('article:' . $id. ':views');
            $storage->zincrby('articleViews', $views, 'article:' . $id);
        }

        $views = $storage->get('article:' . $id. ':views');
        return 'This article with id: ' . $id . ' with views: ' . $views;
    }

    public function categories()
    {
        DB::connection()->enableQueryLog();
        $res = \Cache::remember('blog_categories', 1, function (){
            return Category::where('id', '>', 22)
                ->orderBy('name')
                ->get();
        });

        $log = DB::getQueryLog();
        dump($log);
        dump($res);
    }

    public function tag()
    {
        dump('hello');
    }
}
