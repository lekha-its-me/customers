@extends('layouts.inApp')

@section('title', 'Информация об услуге')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Информация об услуге</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item" ><div class="glyphicon glyphicon-user"></div><span><strong> Название: </strong></span>{{$service->name}}</li>
                        <li class="list-group-item"><div class="glyphicon glyphicon-euro"></div><span><strong> Базовая стоимость: </strong></span>{{$service->basic_price}} грн</li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <p class="badge">Создано: {{$service->created_at}}</p>
                    <p class="badge">Изменено: {{$service->updated_at}}</p>
                </div>
            </div>


        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Действия</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('sell_with_customer', [$service->id]) }}">
                        <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Продать услугу</button>
                        <input type="hidden" name="customer_id" value="{{$service->id}}"/>
                        {{ csrf_field() }}
                    </form>
                    <hr />
                    <a href="{{ url('services/edit', [$service->id]) }}"><button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true" justify></span> Изменить</button></a> <br>
                    <a href="{{ url('services/delete', [$service->id]) }}"><button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove" aria-hidden="true" justify></span> Удалить</button></a>
                </div>

            </div>
        </div>
    </div>
@endsection