<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController4 extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            $movies = [];
        } else {
            // Query đúng theo thầy đưa ra
            $movies = DB::select("select * from movie where movie_name_vn like ?", ["%" . $keyword . "%"]);
        }

        // Lấy danh sách thể loại để hiển thị sidebar (layout đang dùng $genre)
        $genre = DB::table('genre')->get();

        return view('movie.search', compact('movies', 'genre', 'keyword'));
    }
}