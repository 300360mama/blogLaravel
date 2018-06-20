@extends('admin.home')

@section('my_content')

<div class="container-fluid" id="my_content">

    @if(session('error_msg'))
        <section class="msg">
            {{session('error_msg')}}
        </section>
    @endif

    <form id="admin_create_form" action="{{route('insert', ['table'=>$table])}}" method="post">
        {!! csrf_field() !!}
        @foreach($columns as $column)
          @continue(in_array($column, $update_row_forbidden))
          <section class="update_row">
              <span class="name_row">{{ucfirst($column) }}</span>
              @if(key_exists($column, $select_row))

              <select name="{{$column}}" class="create_row">
              @foreach($select_key[$select_row[$column]] as $key)

              <option value="{{$key->id}}">{{$key->name}}</option>
              @endforeach
              </select>

              @else
              <textarea name="{{ $column }}" rows="2" cols="80" class="create_row"></textarea>
              @endif
          </section>


        @endforeach

        <input type="submit" name="insert" class="create_row insert" value="Вставить">
    </form>


</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    @foreach($columns as $column)
        @continue(key_exists($column, $select_row))
        @continue(in_array($column, $update_row_forbidden))
        CKEDITOR.replace('{{ $column }}')
    @endforeach
</script>

@endsection
