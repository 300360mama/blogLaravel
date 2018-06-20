
@extends('admin.home')

@section('my_content')
    <div class="container-fluid" id='my_content'>
        <form class="update" action="{{route('save', ['table'=>$table, 'id'=>$update_row['id']])}}" method="post">
            {!! csrf_field() !!}
            @foreach($update_row as $name=>$value)
            <section class="update_row">
                <span class="name_row">
                    {{ucfirst($name)}}
                </span>
                @if(key_exists($name, $select_row))

                <select name="{{$name}}">
                @foreach($select_key[$select_row[$name]] as $key)

                <option value="{{$key->id}}">{{$key->name}}</option>
                @endforeach
                </select>
                @else
                <textarea class="val_row" name="{{$name}}" rows="2" cols="20"  @if(in_array($name, $update_row_forbidden)) disabled @endif>{{$value}}</textarea>
                @endif


            </section>

            @endforeach
            <input type="submit" name="" value="Обновить">
        </form>

    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>

    @foreach($update_row as $name=>$row)

       @continue(key_exists($name, $select_row))
       @continue(in_array($name, $update_row_forbidden))

       CKEDITOR.replace('{{$name}}')

    @endforeach



    </script>

@endsection
