<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
    <style>
        .info{
            display: grid;
            grid-template-columns:repeat(2,30% 70%)
        }
    </style>
<h4>{{$data->movie_name_vn}}</h4>
<div class='info'>
    <div>
        <img src="{{$data->image_link}}" width="230px" height="350px">
    </div>
    <div>
        Ngày phát hành: <b>{{$data->release_date}}</b><br>
        Quốc gia: <b>{{$data->country_name}}</b><br>
        Thời gian: <b>{{$data->runtime}} phút</b><br>
        Doanh thu: <b>{{$data->revenue}}</b><br>
        <b>Mô tả:</b><br>
        {{$data->overview_vn}}<br>
        <a href="{{$data->trailer}}" class="btn btn-success" style="margin-top: 10px;">
        Xem Trailer
    </a>
    </div>
</div>

</x-movie-layout>