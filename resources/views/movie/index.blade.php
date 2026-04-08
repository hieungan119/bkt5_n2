<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
    <div class="list-movie">
        @foreach($data as $row)
            <div class="movie">
                <a href="#">
                    <img src="{{ asset('storage' . $row->image) }}" width="200" height="300">
                    <br>
                    <b>{{ $row->movie_name_vn }}</b>
                    <br>
                    <b>{{ $row->release_date }}</b>
                </a>
            </div>
        @endforeach
    </div>
</x-movie-layout>