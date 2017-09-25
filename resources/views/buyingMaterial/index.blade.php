@extends('layouts/inApp')
@section("title", "Покупка материала")

@section("content")

    <form method="POST" action="{{ url('buy') }}">
        <div class="form-group">
            <label for="customer">Материал</label>
            <select class="form-control" name="material" id="material">
                @foreach($materials as $material)
                    <option value="{{$material->id}}">{{$material->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" class="form-control" name="price" id="price"/>
        </div>

        <button type="submit" class="btn btn-default">Сохранить</button>
        <a href="{{ url('materials') }}"><button type="button" class="btn btn-default">Отмена</button></a>
        {{ csrf_field() }}
    </form>

@endsection