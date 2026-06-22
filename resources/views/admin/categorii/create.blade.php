@extends('layouts.app')

@section('content')

<style>
    body{
        background:black;
        margin:0px;
    }

    .container{
    display:flex;
    flex-direction:column;
    align-items:center; 
    justify-content:center; 
    min-height:auto;
    }
    h1{
        font-size: 80px;
        background: radial-gradient(
        circle,
        rgba(255,0,234,1) 0%,
        rgba(255,255,255,1) 50%,
        rgba(255,0,234,1) 100%
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color: transparent;

    text-shadow: 0 0 10px #ff00ea,0 0 20px #ff00ea,0 0 40px #ff00ea;
    }
    .Ncategorie{
        padding: 16px 32px;
        font-size: 20px;
        color: #ff00ea;
        background: transparent;
        border: 0;
    }
    .btn{
        background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:18px 36px;
    border-radius:25px;
    cursor: pointer;
    }

</style>
<body>
    <div class="container">
    <h1 class="title">Adauga Categorie</h1>
    <form action="{{ route('categorii.store') }}" method="POST">
        @csrf
    <input class="Ncategorie" type="text" name="nameCategory" placeholder="Nume">
    <button class="btn" type="submit">
        Salveaza
    </button>
    </form>
    </div>
</body>

@endsection