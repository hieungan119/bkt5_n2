<x-movie-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Chi tiết movie</h3>
            </div>
            <div class="card-body">
                @if(isset($phim))
                    <h4>Tên movie: {{ $phim->title }}</h4>
                    <p><strong>Năm sản xuất:</strong> {{ $phim->release_year }}</p>
                    <p><strong>Quốc gia:</strong> {{ $phim->nation }}</p>
                    <p><strong>Mô tả:</strong> {{ $phim->description ?? 'Đang cập nhật...' }}</p>
                @else
                    <div class="alert alert-danger">Không tìm thấy dữ liệu movie này!</div>
                @endif
                <hr>
                <a href="{{ route('movie.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
            </div>
        </div>
    </div>
</x-movie-layout>