@extends("layouts.inApp")

@section("title", "Удаление данных о клиенте")

@section("content")

    <div class="panel panel-danger">
        <div class="panel-heading">Удаление записи</div>
        <div class="panel-body">
            <div class="alert alert-danger" role="alert">Вы действительно хотите удалить запись?</div>


            <p>{{$customer->name}} {{$customer->surname}}</p>
            <form method="POST" action="{{ url('customers/delete', [$customer->id]) }}">
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger">Удалить</button>
                <a href="{{ url('customers') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                {{ csrf_field() }}
            </form>

        </div>
    </div>
@endsection