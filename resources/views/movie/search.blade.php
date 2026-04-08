<x-movie-layout>
    <x-slot name="title">
        Kết quả tìm kiếm cho "{{ $keyword ?? '' }}"
    </x-slot>

    <div style="padding: 20px 0;">
        <h2>Kết quả tìm kiếm cho: <strong>"{{ $keyword ?? '' }}"</strong></h2>

        @if(empty($movies) || count($movies) == 0)
            <p style="color: red; font-size: 18px;">Không tìm thấy bộ phim nào phù hợp với từ khóa của bạn.</p>
        @else
            <div class="list-movie">
                @foreach($movies as $movie)
                    <div class="movie">
                        <a href="{{ url('/phim/' . $movie->id) }}"> <!-- Bạn có thể đổi link này khi phần chi tiết phim hoàn thành -->
                            @php
                                $poster = $movie->image_link;
                                if ($poster && !str_starts_with($poster, 'http')) {
                                    $poster = asset($poster); // xử lý ảnh local (storage/)
                                } elseif (!$poster && $movie->image) {
                                    $poster = 'https://image.tmdb.org/t/p/w300' . $movie->image;
                                }
                            @endphp
                            <img src="{{ $poster }}" alt="{{ $movie->movie_name_vn }}" style="width:100%; border-radius:5px;">

                            <div style="padding:10px 5px;">
                                <h4 style="margin:5px 0;">{{ $movie->movie_name_vn }}</h4>
                                <p style="margin:0; color:#666; font-size:14px;">
                                    <small>Ngày phát hành: {{ $movie->release_date }}</small>
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-movie-layout>