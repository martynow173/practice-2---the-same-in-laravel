
@extends('template')



@section('content')
    <div class="album py-5 bg-light">

        <div class="container">
                <div class="row" >
                <h1>Товар №{{$prod->id}}</h1>
                </div>
                <div class="row" >

                <img src="{{Storage::url($prod->image)}}" class="w-100 h-100"/>
                </div>
                <div class="row" >
                    <h2><strong>{{$prod->name}}</strong></h2>
                </div>
                <div class="row" >

                <h3>Описание</h3>
                </div><div class="row" >

                <p>{{$prod->description}}</p>
                </div>
                <div class="row" >
                    <a href="/table">Вернуться к таблице</a>
                </div>
            </div>
    </div>
@endsection

