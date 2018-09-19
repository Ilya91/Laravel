<?php

namespace App\Http\Controllers\Realtime;

use App\Category;
use App\Concert;
use App\Events\NewEvent;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function realtime()
    {
        return '';
    }

    public function template() :string
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            ->get();

        return view('realtime.template', [
                'categories' => $categories
            ]
        );
    }

    public function ajax()
    {
        return view('realtime.ajax');
    }

    public function chart()
    {
        return view('realtime.chart');
    }

    public function pieChart()
    {
        return view('realtime.pie-chart');
    }

    public function socketChart()
    {
        return view('realtime.socket-chart');
    }

    public function newEvent(Request $request)
    {
        $result =  [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => [
                [ 'label' => 'Sales',
                  'backgroundColor' => ['#F26202', 'yellow', 'green', 'blue'],
                  'data' => [15000, 5000, 30000, 8000],]
            ]
        ];

        if ($request->has('label')){
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (int)$request->input('sale');

            if ($request->has('realtime')){
                if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)){
                    event(new NewEvent($result));
                }
            }
        }

        return $result;
    }

    public function ajaxCategories()
    {
        $categories = Category::where('id', '>', 22)
            ->orderBy('name')
            ->get();
        return $categories;
    }

    public function chartData()
    {
        return [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => [
                [ 'label' => 'Sales',
                'backgroundColor' => ['#F26202', 'yellow', 'green', 'blue'],
                'data' => [15000, 5000, 30000, 8000],]
            ]
        ];
    }

    public function randomData()
    {
        return [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => [
                [
                    'label' => 'Sales',
                  'backgroundColor' => ['#F26202'],
                  'data' => [rand(0, 15000), rand(0, 15000), rand(0, 15000), rand(0, 15000)],
                ],
                [
                    'label' => 'Transport',
                    'backgroundColor' => ['#F23454'],
                    'data' => [rand(0, 15000), rand(0, 15000), rand(0, 15000), rand(0, 15000)],
                ],
            ]
        ];
    }
}
