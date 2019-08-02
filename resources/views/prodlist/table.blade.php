

@extends('template')



@section('content')


{{phpinfo()}}
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Список товаров</h1>
            @if (Auth::user()->isAdmin() == 1)
            <p class="lead text-muted">Товары доступны для просмотра и редактирования</p>
            <p>
                <a href="/addprod" class="btn btn-primary my-2">Добавить товар</a>
                <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
            </p>
            @else
                <p>Вам доступен только просмотр</p>
            @endif

        </div>

    </section>

    <div class="album py-5 bg-light">
        <a href="{{route('table')}}">Все</a>
        @foreach($classes as $class )
            <a href="{{route('table', ['class_id' => $class->class_id])}}">{{$class->class_name}}</a>
        @endforeach
        {{$prods->links()}}
        <div class="container">
{{--            <a href="table/category/0">Все</a>--}}
{{--            @foreach($classes as $class)--}}
{{--                <a href="table/category/{{$class->class_id}}">{{$class->class_name}}</a>--}}

{{--            @endforeach--}}

{{--            <select onchange="document.location=this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">--}}
{{--              <select onchange ="document.location='table/'+this.options[this.selectedIndex].value">--}}
{{--                @for ($i=1; $i <= ceil($count/6); $i++)--}}
{{--                    <option value="{{$i}}"--}}



{{--                    >{{$i}}-{{$i+5}}</option>--}}
{{--                @endfor--}}
{{--            </select>--}}


{{--            <div class="navbar-light">--}}
{{--                <ul class="navigation -clearfix">--}}
{{--                    <li class="navigation-item"><a href="table/1" class="navigation-link" id="menu-item-1">Menu item 1</a></li>--}}
{{--                    <li class="navigation-item"><a href="table/2" class="navigation-link" id="menu-item-2">Menu item 2</a></li>--}}
{{--                    <li class="navigation-item"><a href="table/3" class="navigation-link" id="menu-item-3">Menu item 3</a></li>--}}
{{--                </ul>--}}


{{--            </div>--}}




{{--                @foreach ($prods as $prod)--}}

{{--                <div class="col-md-4">--}}
{{--                    <div class="card mb-4 shadow-sm" style="height:95%">--}}

{{--                    <div style="height:400px">--}}
{{--                        <img src="{{Storage::url($prod->image)}}" class="w-100 h-100"/>--}}
{{--                    </div>--}}




{{--                        <div class="card-body">--}}
{{--                            <a href="/showfull/{{$prod->id}}"><h2 class="card-title">{{$prod->name}}</h2></a>--}}
{{--                            <p class="card-text">{{$prod->description}}</p>--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div class="btn-group" style="margin: 3%">--}}


{{--                                    @if (Auth::user()->isAdmin() == 1)--}}
{{--                                        <form action="{{route('editprod')}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('POST')--}}
{{--                                            <input type="hidden" value="{{$prod->id}}" name="id">--}}
{{--                                            <button type="submit" name="edit" class = "btn btn-sm btn-outline-primary" >Редактировать</button>--}}
{{--                                        </form>--}}
{{--                                        <form action="{{route('delete')}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <input type="hidden" value="{{$prod->id}}" name="id">--}}
{{--                                            <button type="submit" name="Delete product" class="btn btn-sm btn-outline-secondary" style="margin-left: 2%">Удалить</button>--}}
{{--                                        </form>--}}

{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <small class="text-muted" style="text-align: center">{{$prod->class_name}}</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
            <div class="row">
                @foreach ($prods as $prod)
                        <div class="col-md-4">
                        <div class="card mb-4 shadow-sm" style="height:95%">
                            <div style="height:400px">
                                <img src="{{Storage::url($prod->image)}}" class="w-100 h-100"/>
                            </div>
                                <div class="card-body">
                                    <a href="/showfull/{{$prod->id}}"><h2 class="card-title">{{$prod->name}}</h2></a>
                                    <p class="card-text">{{$prod->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group" style="margin: 3%">
                                            @if (Auth::user()->isAdmin() == 1)
                                                <form action="{{route('editprod')}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" value="{{$prod->id}}" name="id">
                                                    <button type="submit" name="edit" class = "btn btn-sm btn-outline-primary" >Редактировать</button>
                                                </form>
                                                <form action="{{route('delete')}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{$prod->id}}" name="id">
                                                    <button type="submit" name="Delete product" class="btn btn-sm btn-outline-secondary" style="margin-left: 2%">Удалить</button>
                                                </form>

                                            @endif
                                        </div>
                                        <small class="text-muted" style="text-align: center">{{$prod->classlist->class_name}}</small>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

