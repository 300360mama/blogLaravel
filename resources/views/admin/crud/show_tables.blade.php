@extends('admin.home')


@section('my_content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="thead-black">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name Table</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach($tables as $table)

                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$table}}</td>
                    <td>
                        <a href="/admin/{{$table}}/read">Выбрать</a>
                    </td>
                </tr>

                @endforeach
           </tbody>
      </table>
    </div>

@endsection
