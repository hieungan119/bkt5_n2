<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div class="container mt-4">
        <h2 class="mb-4">THÊM PHIM MỚI</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên tiếng Anh</label>
                <input type="text" name="movie_name_en" class="form-control" value="{{ old('movie_name_en') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Ngày phát hành</label>
                <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="overview" class="form-control" rows="5">{{ old('overview') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh đại diện</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</x-movie-layout>