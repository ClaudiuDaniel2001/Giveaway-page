@extends('layouts.app')

@section('content')
<style>
    body{
        background: black;
        margin: 0px;
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
.cat{
    font-size:40px;
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
</style>
<body>
    
    <div class="container">
        <h1>Sterge Categoriile</h1>
        @foreach ($categorii as $categorie)
        <p class="cat">{{ $categorie->nameCategory }}</p>
        <form action="{{ route('categorii.destroy', $categorie->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Sterge Categoria</button>
        </form>
       @endforeach
    </div>
</body>
@endsection