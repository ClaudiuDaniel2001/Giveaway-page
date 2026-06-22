@extends('layouts.app')

@section('content')

<style>
    body{
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
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
    .produse{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 30px;
    padding: 30px;
     width:90%;
    margin:60px auto;
     background:linear-gradient(135deg,#ff00ea,#7b00ff);
    border:1px solid rgba(255,0,234,0.25);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 0 35px rgba(255,0,234,0.25);
    
   
}
.card{
     
    margin: 50px auto;
     width:90%;
    margin:60px auto;
    background:rgb(255, 255, 255);
    border:1px solid rgba(255,0,234,0.25);
    border-radius:25px;
    overflow:hidden;
   
    box-shadow:0 0 12px rgba(255,0,234,.5);
   
}
.card img{
     width: 100%;
    height: 170px;
    object-fit: contain;
    background: rgb(255, 255, 255);
    border-radius: 20px 20px 0 0;
    display: block;
}
h3{
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
        background: radial-gradient(
        circle,
        rgb(0, 0, 0) 0%,
        rgb(0, 0, 0) 50%,
        rgb(0, 0, 0) 100%
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color: transparent;

    text-shadow: 0 0 10px #ff00ea,0 0 20px #000000,0 0 40px #ff00ea;
}
p{
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn1{
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
</style>


<div class="produse">
   
    @foreach($categorie->produse as $produs)

    <div class="card">

        @if($produs->images->count())
        <img src="{{ asset('storage/'. $produs->images->first()->image) }}"
        width="200" href="/produse/{{ $produs->id }}/show">
        @endif
         <h3>{{ $produs->title }}</h3>
         <p>{{ $produs->tickets }} Tickets</p>
          @php
    $pretRedus = $produs->price - ($produs->price * $produs->discount / 100);
 @endphp

 @if($produs->discount > 0)
    <p class="dis">
        <del>£{{ number_format($produs->price, 2) }}</del>

        <span>
            £{{ number_format($pretRedus, 2) }}
        </span>

        <strong>
            -{{ $produs->discount }}%
        </strong>
    </p>
 @else
    <p>£{{ number_format($produs->price, 2) }}</p>
 @endif
         
         <a href="{{ route('public.produse.show', $produs->id) }}" class="btn1">VIEW</a>
        
    </div>

    @endforeach

</div>


@endsection