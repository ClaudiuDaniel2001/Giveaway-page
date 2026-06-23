@extends('layouts.app')

@section('content')
<style>

  .container{
    display: block;
    background:transparent;
    max-width:1400px;
    width:90%;
    margin:20px auto;
}

.category-row{
    display:flex;
    justify-content: center;
    margin-bottom:30px;
    border:1px solid rgba(255,0,234,.35);
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 0 25px rgba(255,0,234,.25);
}

.category-info{
    width:260px;
    padding:35px;
    background:linear-gradient(135deg,#ff1493,#4b0082);
    color:white;
}

.category-info h2{
    font-size:32px;
    margin-bottom: 20px;
}

.category-info a{
    color:white;
    text-decoration:none;
    border:1px solid #ff5bea;
    padding:10px 25px;
    border-radius:30px;
}

.products-slider{
    flex:1;
    display:flex;
    gap:20px;
    overflow-x:auto;
    padding:35px;
    background:linear-gradient(135deg,#ff1493,#4b0082);
}

.mini-product{
    min-width:150px;
    height:150px;
    background:linear-gradient(135deg,#ff1493,#4b0082);
    border-radius:12px;
    padding:10px;
}

.mini-product img{
    width:100%;
    height:100%;
    object-fit:contain;
}
</style>


<div class="container">

@foreach($categorii as $categorie)
    <div class="category-row">

        <div class="category-info">
            <div class="icon">🎁</div>

            <h2>{{ $categorie->nameCategory }}</h2>
          

            <a href="{{ route('categorie.show', $categorie->id) }}">
                Vezi toate →
            </a>
        </div>

        <div class="products-slider">
            @foreach($categorie->produse as $produs)
                @if($produs->images->count())
                    <div class="mini-product">
                        <img src="{{ asset('storage/' . $produs->images->first()->image) }}">
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endforeach

</div>

@endsection
