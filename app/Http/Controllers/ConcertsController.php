<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ConcertsController extends Controller
{
    public function show($id)
    {
        $concert = Concert::find($id);
        return $concert;
    }
}
