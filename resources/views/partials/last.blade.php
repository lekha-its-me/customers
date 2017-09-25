<div class="panel panel-default">
    <div class="panel-heading">Последние заказы</div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Клиент</th>
                <th>Услуга</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($last_arr as $item)
                <tr>
                    <td>{{ $item[0] }}</td>
                    <td>{{ $item[1] }}</td>
                    <td>{{ $item[2] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>