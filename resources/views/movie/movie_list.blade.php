<x-movie-layout>
    <x-slot name="title">
        Movie List
    </x-slot>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">
  <style>
    .dt-custom-buttons {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .btn-add-green {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
    }
    .btn-add-green:hover {
      background-color: #218838;
      color: white;
      text-decoration: none;
    }
  </style>

    <div style='text-align:center;font-weight:bold'>DANH SÁCH PHIM</div>
    <div class="dt-custom-buttons">
      <a href="{{ route('admin.create') }}" class="btn-add-green">
        <i></i> Thêm
      </a>
    </div>
    <table id = "movie-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Ngày phát hành</th>
                <th>Điểm đánh giá</th>
                <th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td><img src="{{ asset('storage/' . $movie->image) }}"  style="width: 100px; height: auto;"></td>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->overview }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->vote_average }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{url('detail/'.$movie->id)}}" class='btn btn-sm btn-primary'>Xem</a>
                        &nbsp;
                        <form method='post' action = "{{url('movie/delete/'.$movie->id)}}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bộ phim này không?');">
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                            {{ csrf_field() }}
                        </form>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
           
            $('#movie-table').DataTable();
        });
    </script>
</x-movie-layout>