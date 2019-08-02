@extends('template')



@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <form action="{{route('saveedited')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{$prod->id}}">
                    <div class="form-group">
                        <h2>Название</h2>
                        <input type="text" name="name" value="{{$prod->name}}">
                    </div><div class="form-group">
                        <h2>Текущее изображение</h2>
                        <img src="{{Storage::url($prod->image)}}" class="w-100 h-100"/>

                        <h2>Выбрать новое</h2>

                        <input type="file" name="prodimage" class="form-control"></div><div class="form-group">
                        <h2>Описание</h2>
                        <input type="text" name="description" value="{{$prod->description}}"></div>
                    <div class="form-group">
                        <h2>Категория</h2>
                        <select name = "class_id">
                            <p>{{$prod->class_id}}</p>
                            @foreach ($classes as $class)
                                <option value = "{{$class->class_id}}"
                                    @if($class->class_id == $prod->class_id)
                                        selected="selected"
                                    @endif
                                >{{$class->class_name}}</option>
                            @endforeach
                        </select></div><div class="form-group">
                        <br><br><button type="submit" name="sumbit" class = "btn btn-sm btn-outline-primary">Сохранить</button><a href="/table">Отменить и вернуться</a></div>
                </form>
            </div>
        </div>
    </div>



@endsection