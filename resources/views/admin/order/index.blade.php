@extends('layouts.app')

@section('content')


<style>
    body{
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
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
    .card{
        border:1px solid rgba(255,0,234,0.25);
        border-radius: 25px;
        margin-left: 20px;
        margin-right: 20px;
        margin-top: 10px;
    }
    button{
         display:flex;
    justify-content: center;
    padding:10px 22px;
    margin:5px;
    border-radius:25px;
    text-decoration:none;
    color:white;
    background:linear-gradient(135deg,#ff00ea,#7b00ff);
    border:none;
    cursor:pointer;
    box-shadow:0 0 12px rgba(255,0,234,.5);
    }
    strong{
        margin-left: 20px;
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


</style>
<body>
    <h1>Admin Order</h1>
    @foreach($orders as $order)
    <div class="con">
        <div class="card">
           <p><strong> Order #{{ $order->id }}</strong></p>
         <div class="body">
        
              <p><strong>User:</strong> {{ $order->user->name }}</p>
              <p><strong>Status:</strong> {{ $order->status }}</p>
              <p><strong>Total:</strong> {{ $order->Total}}</p>
                   @if($order->status === 'confirmed')
              <form action="/admin/order/{{ $order->id }}/ship" method="POST">

                  @csrf
          
              </form>
                <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display:inline;">
                               @csrf
                               @method('DELETE')

                            <button type="submit" onclick="return confirm('Sigur vrei să ștergi comanda?')">Șterge</button>
                </form>
                @else
                <span class="alarm">{{ $order->status }}</span>
            
                @endif
                 <div class="table-box">
                       <table class="tab">
                          <tr>
                            <th>Produs</th>
                            <th>Cant</th>
                            <th>Price</th>
                          </tr>

                           @foreach($order->orderDetails as $item)

                          <tr>
                            <td>{{ $item->produs->title}}</td>
                            <td>
                                @foreach($order->tickets as $ticket)
    {{ $ticket->ticket_number }}
    @endforeach
                            </td>
                            <td>{{ $order->Total}}</td>
                          </tr>
                          @endforeach
                        </table>
             </div>
        </div>
    </div>
    
    @endforeach
</body>

@endsection