<center>
    <h1>
        Order Photograph
    </h1>
</center>
<table width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Service Name</th>
            <th>Order By</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->service->service }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->service_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />