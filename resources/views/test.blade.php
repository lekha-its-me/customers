<!DOCTYPE html>
        <html>
<head>

</head>
<body>
@foreach($customers as$customer)
    {{ $customer->name }}
    @endforeach

{{ $customers->render }}
</body>
</html>