<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    private function getGenres()
    {
        return DB::table('genre')->get();
    }

    public function index()
    {
        $genre = $this->getGenres();

        $query = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7);

        // Nếu bạn đã thêm cột status thì bỏ comment dòng dưới
        if ($this->hasStatusColumn()) {
            $query->where('status', 1);
        }

        $data = $query->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('data', 'genre'));
    }

    public function getMoviesByGenre($id)
    {
        $genre = $this->getGenres();

        $query = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->select('movie.*');

        // Nếu bạn đã thêm cột status thì bỏ comment dòng dưới
        if ($this->hasStatusColumn()) {
            $query->where('movie.status', 1);
        }

        $data = $query->orderBy('movie.release_date', 'desc')
            ->limit(12)
            ->get();

        return view('movie.index', compact('data', 'genre'));
    }

    private function hasStatusColumn()
    {
        static $checked = null;

        if ($checked !== null) {
            return $checked;
        }

        try {
            $columns = DB::select("SHOW COLUMNS FROM movie LIKE 'status'");
            $checked = count($columns) > 0;
            return $checked;
        } catch (\Exception $e) {
            $checked = false;
            return false;
        }
    }
}