<x-movie-layout>
    <x-slot name="title">Movie Detail - {{ $movie->movie_name_vn ?? 'Movie' }}</x-slot>

    <div class="row mt-4">
        <div class="col-md-4 text-center">
            <img src="{{ $movie->image_link ?? $movie->image }}" 
                 class="img-fluid rounded" style="max-height:500px; object-fit:cover;">
        </div>
        <div class="col-md-8">
            <h1>{{ $movie->movie_name_vn }}</h1>
            <h5 class="text-muted">{{ $movie->movie_name }} ({{ $movie->original_name }})</h5>
            
            <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
            <p><strong>IMDb:</strong> {{ $movie->vote_average }} / 10 ({{ $movie->vote_count }} votes)</p>
            <p><strong>Popularity:</strong> {{ $movie->popularity }}</p>
            <p><strong>Runtime:</strong> {{ $movie->runtime }} minutes</p>

            <hr>
            <h5>Overview:</h5>
            <p style="line-height:1.8">{{ $movie->overview_vn }}</p>

            @if($movie->trailer)
                <a href="{{ $movie->trailer }}" target="_blank" class="btn btn-danger">
                    <i class="fa fa-play"></i> Watch Trailer
                </a>
            @endif
        </div>
    </div>
</x-movie-layout>