@extends('layouts.inApp')

@section('title', 'Список клиентов')

@section('content')
    <div class="container-fluid">
        <p><a href="{{url('materials/create')}}"><button type="button" class="btn btn-primary">Добавить новый материал</button></a></p>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
                @foreach($materials as $material)
                    <a href="{{ url('materials', [$material->id]) }}">
                        <tr>
                            <td><a href="{{ url('materials', [$material->id]) }}">{{$material->title}}</a></td>
                            <td class="col-sm-2">
                                <a class="btn btn-warning" href="{{ url('materials', [$material->id]) }}" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    </a>
                @endforeach
            </table>

            {{--{!! $customers->render() !!}--}}

        </div>
    </div>
@endsection