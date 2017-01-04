@extends("layouts.inApp")

@section("title", "Удаление данных об услуге")

@section("content")

    <div class="panel panel-danger">
        <div class="panel-heading">Удаление записи</div>
        <div class="panel-body">
            <div class="alert alert-danger" role="alert">Вы действительно хотите удалить запись?</div>


            <p><strong>Название: </strong>{{$service->name}}, <strong>Базовая цена: </strong> {{$service->basic_price}}</p>
            <form method="POST" action="{{ url('services/delete', [$service->id]) }}">
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger">Удалить</button>
                <a href="{{ url('services') }}"><button type="button" class="btn btn-default">Отмена</button></a>
                {{ csrf_field() }}
            </form>

        </div>
    </div>
@endsection