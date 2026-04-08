<x-movie-layout>
    <x-slot name="title">MovieDB - Home</x-slot>

    <div class="list-movie" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; padding: 20px 0;">
        @if($movies->isEmpty())
            <p class="text-center col-12">Không tìm thấy phim nào.</p>
        @else
            @foreach($movies as $movie)
                <div class="movie" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <a href="{{ url('/phim/' . $movie->id) }}" style="text-decoration: none; color: inherit;">
                        <img src="{{ $movie->image_link ?? $movie->image }}" 
                             style="width: 100%; height: 320px; object-fit: cover; display: block;">
                        
                        <div style="padding: 12px 10px; background: white;">
                            <div style="font-weight: bold; font-size: 15px; line-height: 1.3; margin-bottom: 4px;">
                                {{ $movie->movie_name_vn }}
                            </div>
                            <div style="font-size: 13px; color: #666; text-align: center;">
                                {{ $movie->release_date }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-movie-layout>