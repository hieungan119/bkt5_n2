<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieControllerNhien extends Controller
{
    //
    public function index(){
        $data = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();
    return view("movie.index", compact('data'));    
    }

    function detail($id)
    {
    $results = DB::select("select * from movie where id = ?", [$id]);    
    $data = collect($results)->first(); 
    if (!$data) {
        abort(404);
    }
    return view("movie.detail", compact("data"));
    }
}
