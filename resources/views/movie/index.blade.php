<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
    <div class='list-movie'>
        @foreach($data as $row)
            <div class='movie'>
                <a href="{{ url('home/detail/' . $row->id) }}">
                <img src="{{$row->image_link}}" width='200px' height='300px'><br>
                <b>{{$row->movie_name_vn}}</b><br/>
                <b>{{$row->release_date}}</b><br/>
                </a>
            </div>
        @endforeach
    </div>
</x-movie-layout>