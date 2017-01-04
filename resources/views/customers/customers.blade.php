@extends('layouts.inApp')

@section('title', 'Список клиентов')

@section('content')
 <div class="container-fluid">
  <p><a href="{{url('customers/create')}}"><button type="button" class="btn btn-primary">Создать нового клиента</button></a></p>
  <div class="table-responsive">
    <table class="table table-hover">
     <tr>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Действия</th>
     </tr>
     @foreach($customers as $item)
      <a href="{{ url('customers', [$item->id]) }}">
      <tr>
       <td><a href="{{ url('customers', [$item->id]) }}">{{$item->name}}</a></td>
       <td><a href="{{ url('customers', [$item->id]) }}">{{$item->surname}}</a></td>
       <td class="col-sm-2">
        <a class="btn btn-primary" href="{{ url('customers', [$item->id]) }}" role="button">
         <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        </a>
        <a class="btn btn-warning" href="{{ url('customers/edit', [$item->id]) }}" role="button">
         <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </a>
        <a class="btn btn-danger" href="{{ url('customers/delete', [$item->id]) }}" role="button">
         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </a>
       </td>
      </tr>
      </a>
     @endforeach

    </table>
   {!! $customers->render() !!}

  </div>
 </div>
@endsection