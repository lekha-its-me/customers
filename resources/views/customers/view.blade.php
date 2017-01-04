@extends('layouts.inApp')

@section('title', 'Информация о клиенте')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Информация о клиенте</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item" ><div class="glyphicon glyphicon-user"></div> {{$customer->name}}</li>
                        <li class="list-group-item"><div class="glyphicon glyphicon-user"></div> {{$customer->surname}}</li>
                        <li class="list-group-item"><div class="glyphicon glyphicon-phone"></div> {{$customer->phone}}</li>
                        <li class="list-group-item"><div class="glyphicon glyphicon-calendar"></div> {{$customer->birthday}}</li>
                        <li class="list-group-item"><div class="glyphicon glyphicon-list-alt"></div> {{$customer->comment}}</li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <p class="badge">Создано: {{$customer->created_at}}</p>
                    <p class="badge">Изменено: {{$customer->updated_at}}</p>
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Заказы клиента</div>
                <div class="panel-body">

                    <table class="table table-hover">
                        <th>Название услуги</th>
                        <th>Цена услуги</th>
                        <th>Дата продажи</th>
                        @foreach($services as $s)
                            <tr>
                                @foreach($listOfService as $l)
                                    @if($s->pivot->service_id == $l->id)
                                        <td>{{$l->name}}</td>
                                    @else

                                    @endif
                                @endforeach
                                    <td>{{$s->pivot->price}}</td>
                                    <td>{{$s->pivot->created_at}}</td>
                        @endforeach
                            </tr>
                            <tr><td class="info" colspan="3">Всего: {{ $totalPrice }}</td></tr>
                    </table>

                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Действия</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('sell_with_customer', [$customer->id]) }}">
                        <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Продать услугу</button>
                        <input type="hidden" name="customer_id" value="{{$customer->id}}"/>
                        {{ csrf_field() }}
                    </form>
                    <hr />
                    <a href="{{ url('customers/edit', [$customer->id]) }}"><button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true" justify></span> Изменить</button></a> <br>
                    <a href="{{ url('customers/delete', [$customer->id]) }}"><button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove" aria-hidden="true" justify></span> Удалить</button></a>
                </div>

            </div>
        </div>
    </div>
    <div class="row">

    </div>
    </div>

@endsection