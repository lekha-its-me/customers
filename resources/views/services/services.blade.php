@extends('layouts.inApp')

@section('title', 'Список услуг')

@section('content')
    <div class="container-fluid">
        <p><a href="{{url('services/create')}}"><button type="button" class="btn btn-primary">Создать новую услугу</button></a></p>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Название</th>
                    <th>Базовая цена</th>
                    <th>Действия</th>
                </tr>
                @foreach($services as $item)
                    <a href="{{ url('services', [$item->id]) }}">
                        <tr>
                            <td><a href="{{ url('services', [$item->id]) }}">{{$item->name}}</a></td>
                            <td>{{$item->basic_price}}</td>
                            <td class="col-sm-2">
                                <a class="btn btn-primary" href="{{ url('services', [$item->id]) }}" role="button">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                                <a class="btn btn-warning" href="{{ url('services/edit', [$item->id]) }}" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a class="btn btn-danger" href="{{ url('services/delete', [$item->id]) }}" role="button">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    </a>
                @endforeach

            </table>
            {!! $services->render() !!}

        </div>
    </div>
@endsection