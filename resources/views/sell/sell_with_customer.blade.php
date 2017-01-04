@extends("layouts.inApp")

@section("title", "Продажа")

@section('script')
<script type="text/javascript">
        $("#service").change(function(){
            var choice = $('#service').val();
            var service = $('#selected');
            service.val(choice);
        });
</script>
@endsection

@section("content")

<form method="POST" action="{{ url('sell') }}">
    <div class="form-group">
        <label for="customer">Клиент</label>
        <input type="text" class="form-control" name="customer" id="customer" value="{{$customer->name}}" disabled/>
    </div>
    <div class="form-group">
        <label for="service">Услуга</label>
        <select class="form-control" name="service" id="service" required>
        <option value="">Выберите из списка</option>
        @foreach($services as $service)
          <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="customer">Базовая цена</label>
        <input type="text" class="form-control" name="basic_price" id="basic_price" value="{{$service->basic_price}}" disabled/>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <div class="input-group">
            <input type="text" class="form-control" name="price" id="price" required/>
            <span class="input-group-addon">грн</span>
        </div>
    </div>
    <input type="hidden" name="customer_id" value="{{$customer->id}}"/>
    <input type="hidden" name="service_id" id="selected"/>

    <button type="submit" class="btn btn-default">Сохранить</button>
      <a href="{{ url('customers') }}"><button type="button" class="btn btn-default">Отмена</button></a>
      {{ csrf_field() }}
</form>

@endsection