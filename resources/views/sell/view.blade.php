@extends("layouts.inApp")

@section("title", "Продажа")

@section("content")
<div class="container-fluid">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel panel-heading">Отчет по продажам:
                <!-- TODO: 1. Разобраться с форматом даты -->
                С {{ isset($beginDate) ? date($beginDate) : '01.01.2017' }} По: {{ isset($endDate) ? date($endDate) : date('d.m.Y', time()) }}
            </div>
            <div class="panel panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Название</th>
                            <th>Сумма продаж</th>
                        </tr>

                            <?php
                            $length = count($priceArr);
                            for ($i = 0; $i < $length; $i++)
                            {
                                foreach ($priceArr[$i] as $key => $value)
                                {
                                    ?>
                                        <tr>
                                            <td><?=$key ?></td>
                                            <td><?=$value ?></td>
                                        </tr>
                                    <?php
                                }
                            }
                            ?>
                     </table>
                 </div>
            </div>
            <div class="panel panel-footer">Всего: <strong>{{ $sum }}</strong></div>
        </div>
    </div>
    <div class="col-md-3">
        <form method="post" action="view">
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