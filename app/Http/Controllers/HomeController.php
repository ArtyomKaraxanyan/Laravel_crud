<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Posts;

class HomeController extends Controller
{
    function showlist() {
        $list = Posts::get();
        return View::make('home/list', ['list' => $list]);
    }


    function showsingle($id) {
        $content = Posts::find($id);
        return View::make('home/single', ['content' => $content]);
    }

    function search($query) {
        $list = Posts::where('name', 'LIKE', '%'.$query.'%')->get();
        return View::make('home/list', ['list' => $list]);
    }
}
