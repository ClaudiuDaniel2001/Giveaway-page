@extends('layouts.app')

@section('content')

<style>
 body{
    background:#050505;
    color:white;
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
}

.btn1{
    display:inline-block;
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
.btn{
    display:inline-block;
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
.btn3{display:inline-block;
    padding:10px 22px;
    margin:5px;
    border-radius:25px;
    text-decoration:none;
    color:white;
    background:linear-gradient(135deg,#ff0066,#b000ff);
    border:none;
    cursor:pointer;
}
</style>
<body>
<h1>Produse</h1>

<a href="{{ route('produse.create') }}" class="btn1">
    +Creeare produse
</a>
<div class="table-box">
<table class='tab'>

    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Tickets</th>
        <th>Editare/Stergere</th>
    </tr>

    @foreach($produses as $produs)

    <tr>
        <td>{{ $produs ->id }}</td>
        <td>@if($produs->images->count())
            <img src="{{ asset('storage/' . $produs->images->first()->image) }}" width="80">
            @endif
        </td>
        <td>{{ $produs->title }}</td>
        <td>{{ $produs->price }}</td>
        <td>{{ $produs->tickets }}</td>
        <td><a href="/admin/produse/{{ $produs->id }}/edit" class="btn">Editare</a>
            <form action="{{ route('produse.destroy', $produs->id)}}"
                method="POST"
                class="d-inline" >
              @csrf
              @method('DELETE')
              <button class="btn3" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
</body>        
    
@endsection