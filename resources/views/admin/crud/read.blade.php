
@extends('admin.home')

@section('my_content')
    <div class="container-fluid" id='my_content'>
        <section class="add">
            <a href="{{route('admin_add', ['table'=>$table]) }}">Добавить поле в таблицу</a>
        </section>
        <table class="table table-bordered">
            <thead class="thead-black">

                <tr>
                  <th scope="col">#</th>
                  @foreach($columns as $column)

                  @continue($column->Field == 'id')
                  <td scope="col">{{$column->Field}}</td>

                  @endforeach

                  <td>Action</td>
                </tr>
            </thead>
            <tbody id='table_body'>

                @foreach($list_data as $value)


                <tr>
                    <th scope="row">{{$loop->index+1}}</th>

                    @foreach($value as $key=>$data)

                    @continue($key == 'id')

                    <td>{{$data}}</td>
                    @endforeach

                    <td>
                        <a class="delete_row" href="{{route('admin_delete', ['table'=>$table, 'row_id'=>$value->id])}}">Delete</a>
                        <a href="{{route('admin_update', ['table'=>$table, 'row_id'=>$value->id])}}">Update</a>
                    </td>
                </tr>

                @endforeach


           </tbody>
        </table>

       {{$list_data->links()}}


    </div>


@endsection
