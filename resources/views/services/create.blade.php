@extends('layouts.inApp')

{{--TODO:добавить валидацию и проверку ввода--}}
@section('title', 'Cоздание новой услуги')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Новая услуга</div>
            <div class="panel-body">
                <form method="POST" action="{{ url('services') }}">
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="basic_price">Базовая цена</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="basic_price" id="basic_price" placeholder="Базовая цена">
                            <span class="input-group-addon">грн</span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                    <a href="{{ url('services') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection