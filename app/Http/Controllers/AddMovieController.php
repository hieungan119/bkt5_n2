<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddMovieController extends Controller
{
    public function create()
    {
        $genre = DB::table('genre')->get();
        return view('movie.admin.create', compact('genre'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_name'   => 'required',
            'movie_name_en'   => 'required',
            'movie_name_vn'   => 'required',
            'release_date'    => 'required|date_format:Y-m-d',
            'overview'        => 'required',
            'image'           => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ], [
            'movie_name_en.required' => 'Vui lòng nhập tên tiếng Anh.',
            'movie_name_vn.required' => 'Vui lòng nhập tên tiếng Việt.',
            'release_date.required'  => 'Vui lòng nhập ngày phát hành.',
            'release_date.date_format' => 'Ngày phát hành phải đúng định dạng yyyy-mm-dd.',
            'overview.required'      => 'Vui lòng nhập mô tả.',
            'image.required'         => 'Vui lòng chọn ảnh đại diện.',
            'image.uploaded'        => 'Ảnh tải lên không thành công. Vui lòng thử lại.',
            'image.image'            => 'File upload phải là hình ảnh.',
            'image.mimes'            => 'Ảnh đại diện phải có định dạng jpg, jpeg, png, gif hoặc webp.',
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        // Lưu ảnh vào disk `public` để truy cập qua URL /storage/{filename}
        $request->file('image')->storeAs('', $imageName, 'public');

        DB::table('movie')->insert([
            'movie_name' => $request->movie_name_en,
            'movie_name_vn' => $request->movie_name_vn,
            'release_date'  => $request->release_date,
            'overview'      => $request->overview,
            'image'         => $imageName,
            'status'        => 1,
        ]);

        return redirect()->route('admin.create')->with('success', 'Thêm phim mới thành công.');
    }
}