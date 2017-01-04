@extends('layouts.inApp')
@section('title', 'Cоздание нового клиента')
@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Новый клиент</div>
            <div class="panel-body">
                <form method="POST" action="{{ url('customers') }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Фамилия</label>
                        <input type="text" class="form-control" name="surname" id="exampleInputPassword1" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Телефон</label>
                        <input type="phone" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Дата рождения</label>
                        <input type="date" class="form-control" name="birthday" id="exampleInputPassword1" placeholder="Дата рождения">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Комментарий</label>
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Сохранить</button>
                    <a href="{{ url('customers') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection