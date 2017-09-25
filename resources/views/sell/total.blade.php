@extends('layouts.inApp')

@section('title', 'Общий отчет')

@section('content')

    <div class="container-fluid">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel panel-heading">Отчет о доходах:
                    <!-- TODO: 1. Разобраться с форматом даты -->
                    С {{ isset($beginDate) ? date($beginDate) : '01.01.2017' }} По: {{ isset($endDate) ? date($endDate) : date('d.m.Y', time()) }}
                </div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <th>Доход</th>
                            <th>Расход</th>
                            <th>Итого</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ isset($services) ? $services : '0' }}</td>
                                <td>{{ isset($materials) ? $materials : '0' }}</td>
                                <td>{{ isset($total) ? $total : '0' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <form method="post" action="/sell/total">
                <div class="form-group">
                    <label for="beginDate">С: </label>
                    <input type="date" class="form-control" id="beginDate" name="beginDate">
                </div>
                <div class="form-group">
                    <label for="endDate">По: </label>
                    <input type="date" class="form-control" id="endDate" name="endDate">
                </div>
                <button type="submit" class="btn btn-default">Показать</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection