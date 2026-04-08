<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController4 extends Controller
{
    public function index()
    {
        $genres = DB::table('genre')->get();

        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('movies', 'genres'));
    }

    public function genre($id)
    {
        $genres = DB::table('genre')->get();

        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->select('movie.*')
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('movies', 'genres'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $genres = DB::table('genre')->get();

        $movies = DB::table('movie')
            ->where('movie_name_vn', 'LIKE', "%{$keyword}%")
            ->orWhere('movie_name', 'LIKE', "%{$keyword}%")
            ->orWhere('overview_vn', 'LIKE', "%{$keyword}%")
            ->orWhere('overview', 'LIKE', "%{$keyword}%")
            ->orderBy('release_date', 'desc')
            ->get();

        return view('movie.index', compact('movies', 'genres'));
    }

    public function show($id)
    {
        $genres = DB::table('genre')->get();
        $movie = DB::table('movie')->find($id);

        return view('movie.show', compact('movie', 'genres'));
    }
}