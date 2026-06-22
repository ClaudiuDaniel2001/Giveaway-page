@extends('layouts.app')


@section('content')
    
<style>
    body{
    background:rgb(0, 0, 0);
    margin:0;
}

.container{
    display:flex;
    flex-direction:column;
    align-items:center; 
    justify-content:center; 
    min-height:auto;
}

h1{
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

.btn{
    background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:16px 32px;
    border-radius:25px;
    cursor: pointer;
    font-size: 20px;
}
.btn1{
    margin-top: 10px;
    background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:16px 32px;
    border-radius:25px;
    cursor: pointer;
    font-size: 20px;
}
.btn2{
    margin-top: 10px;
    background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:16px 32px;
    border-radius:25px;
    cursor: pointer;
    font-size: 20px;
}
.btn3{
    margin-top: 10px;
    background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:16px 68px;
    border-radius:25px;
    cursor: pointer;
    font-size: 20px;
}
</style>

    <div class="container">
    <h1 class="titlu">-Panou de control-</h1>

<a href="{{ route('categorii.create') }}" class="btn">
    Adauga categorie
</a>
<a href="{{ route('categorii.edit') }} "class="btn1"> 
    Sterge Categoria
</a>

<a href="{{ route('produse.index') }}" class="btn3">
   Produse
</a>
@foreach ($categorii as $categorie)
<p>{{$categorie->nameCategory}}</p>

@endforeach
</div>


@endsection


