<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    //

    public function movie_list()
    {
        $movies = DB::table('movie')->where("status", 1)->get();
        return view('movie.movie_list', compact('movies'));
    }

    public function movie_delete($id)
    {
        DB::table('movie')->where('id', $id)->update(["status" => 0]);
        return redirect()->back();
    }
}
