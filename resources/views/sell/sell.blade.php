@extends("layouts.inApp")

@section("title", "Продажа")

@section("content")

    <form method="POST" action="{{ url('sell') }}">
        <div class="form-group">
            <label for="customer">Клиент</label>
            <select class="form-control" name="customer" id="customer">
                @foreach($customers as $customer)
                    <option value="{{$customer->name}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service">Услуга</label>
            <select class="form-control" name="service" id="service">
                      @foreach($services as $service)
                    <option value="{{$service->name}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service">Цена</label>
            <input type="text" class="form-control" name="price" id="price"/>
        </div>
        <input type="hidden" name="customer_id" value="{{$customer->id}}"/>
        <input type="hidden" name="service_id" value="{{$service->id}}"/>

        <button type="submit" class="btn btn-default">Сохранить</button>
        <a href="{{ url('customers') }}"><button type="button" class="btn btn-default">Отмена</button></a>
        {{ csrf_field() }}
    </form>

@endsection