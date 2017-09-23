@extends('layouts.inApp')

@section('title', 'Cоздание нового материала')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Новый материал</div>
            <div class="panel-body">
                <form method="POST" action="{{ url('materials/create') }}">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Название">
                    </div>
                    <button type="submit" class="btn btn-default">Сохранить</button>
                    <a href="{{ url('materials') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection