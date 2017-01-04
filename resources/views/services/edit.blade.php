@extends('layouts.inApp')

@section('title', 'Редакторование информации об услуге')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Информация об услуге</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('services/edit', [$service->id]) }}">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$service->name}}">
                        </div>
                        <div class="form-group">
                            <label for="basic_price">Базовая цена</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="basic_price" id="basic_price" value="{{$service->basic_price}}">
                                <span class="input-group-addon">грн</span>
                            </div>
                        </div>
                            <input type="hidden" name="id" value="{{$service->id}}"/>
                        <button type="submit" class="btn btn-default">Сохранить</button>
                        <a href="{{ url('services') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

@endsection