
@extends('template')



@section('content')
    <div class="col md-8">
        <div class="card">
            <div class="card-header">Новый товар</div>
            <div class="card-body">
                <form name="newProdData" action="saveprod" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                    <h2>Название</h2>
                    <input type="text" name="name">
                    </div><div class="form-group">
                    <h2>Изображение</h2>
                        <input type="file" name="prodimage" class="form-control"></div><div class="form-group">
                    <h2>Описание</h2>
                    <input type="text" name="description">
                    </div><div class="form-group">
                    <h2>Категория</h2>
                    <select name = "class_id">
                    @foreach ($classes as $class)
                            <option value = "{{$class->class_id}}">{{$class->class_name}}</option>
                    @endforeach
                    </select></div><div class="form-group">
                        <br><br><button type="submit" name="sumbit" class = "btn btn-sm btn-outline-primary">Сохранить</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
