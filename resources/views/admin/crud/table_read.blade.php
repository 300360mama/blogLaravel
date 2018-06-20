@section('my_content')

                @foreach($list_data as $value)


                <tr>
                    <th scope="row">{{$loop->index+1}}</th>

                    @foreach($value as $key=>$data)

                    @continue($key == 'id')

                    <td>{{$data}}</td>
                    @endforeach

                    <td>
                        <a class="delete_row" href="{{route('admin_delete', ['table'=>$table, 'row_id'=>$value->id])}}">Delete</a>
                        <a href="{{route('admin_update', ['table'=>$table])}}">Update</a>
                    </td>
                </tr>

                @endforeach


                <div id="popup_res">
                    helloooooooooooo
                </div>
@show
