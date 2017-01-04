@extends('layouts.inApp')

@section('title', 'Редакторование информации о клиенте')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Информация о клиенте</div>
                            <div class="panel-body">
                            <form method="POST" action="{{ url('customers/edit', [$customer->id]) }}">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$customer->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input type="text" class="form-control" name="surname" id="surname" value="{{$customer->surname}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="phone" class="form-control" name="phone" id="phone" value="{{$customer->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="date">Дата рождения</label>
                                    <input type="date" class="form-control" name="birthday" id="date"  value="{{$customer->birthday}}">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Комментарий</label>
                                    <textarea class="form-control" name="comment" rows="3"  value="{{$customer->comment}}"></textarea>
                                </div>
                                <input type="hidden" name="id" value="{{$customer->id}}"/>
                                <button type="submit" class="btn btn-default">Сохранить</button>
                                <a href="{{ url('customers') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                                {{ csrf_field() }}
                            </form>
                        </div>
        </div>
    </div>

@endsection