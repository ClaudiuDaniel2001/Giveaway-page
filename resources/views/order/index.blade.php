@extends('layouts.app')

@section('content')

<style>
body{
    background:#ffffff;
    color:rgb(0, 0, 0);
}
h1{
    display: flex;
    justify-content: center;
    font-size:80px;

    background: radial-gradient(
        circle,
        rgba(255,0,234,1) 0%,
        rgba(255,255,255,1) 50%,
        rgba(255,0,234,1) 100%
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;

    text-shadow:
        0 0 10px #ff00ea,
        0 0 20px #ff00ea,
        0 0 40px #ff00ea;
}


.table-box{
    width:90%;
    margin:60px auto;
    background:rgba(255,255,255,0.04);
    border:1px solid rgba(255,0,234,0.25);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 0 35px rgba(255,0,234,0.25);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    padding:25px;
    background:linear-gradient(135deg, rgba(255,0,234,.35), rgba(123,0,255,.35));
    color:white;
    font-size:18px;
}

td{
    padding:25px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,0.12);
}

tr:hover{
    background:rgba(255,0,234,0.08);
}

td img{
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:15px;
    box-shadow:0 0 15px rgba(255,0,234,.4);
}</style>
<body>
    <h1>Comenzile mele</h1>
    <div class="table-box">
<table>
    <tr>
        <th>Order</th>
        <th>Imges</th>
        <th>Tickets</th>
        <th>Total</th>
    </tr>
@foreach ($orders as $order)
    <tr>
    <td>{{ $order->id }}</td>

    <td>
        @foreach($order->orderDetails as $item)

            @if($item->produs && $item->produs->images->count())
                <img src="{{ asset('storage/' . $item->produs->images->first()->image) }}"
                     width="80">
            @endif

            <p>{{ $item->produs->title ?? 'Produs șters' }}</p>

        @endforeach
    </td>
    <td>
@foreach($order->tickets as $ticket)
    {{ $ticket->ticket_number }}
    @endforeach
    </td>
    <td>{{ $order->Total }}</td>
</tr>
    @endforeach
</table>
</div>
</body>
@endsection