@extends('layouts.app')

@section('content')

<style>
    h1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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
    .contact{
        display: block;
    background:transparent;
    max-width:1400px;
    width:90%;
    margin:20px auto;
    }
    .sos{
        margin-top: 50px;
        display:flex;
    justify-content:flex-start;
     background: radial-gradient(
        circle,
        rgba(255,0,234,1) 0%,
        rgba(255,255,255,1) 50%,
        rgba(255,0,234,1) 100%
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color: transparent;

    text-shadow: 0 0 2px #ff00ea,0 0 5px #ff00ea,0 0 10px #ff00ea;
    }
    .fa{
        margin-top: 30px;
    }
    .pm{
        margin-top: 30px;
        font-size: 30px;
    }
</style>
<div class="contact">
<h1>Contact us</h1>
<i class="fa fa-envelope" style="font-size:40px"></i>
<p class="pm">casperthe851@gmail.com</p>
<i class="fa fa-phone" style="font-size:36px"></i>
<p class="pm">0735916451</p>
<p class="sos"><a href="https://www.facebook.com/claudiu.alexandroae" clsss="facebook" style='font-size:50px' class='fab'>&#xf09a;</a></p>
<p class="sos"><a href="https://www.instagram.com/claudiu_daniel.11/?hl=ro" style='font-size:50px' class='fab'>&#xf16d;</a></p>
<p class="sos"><a href="https://www.tiktok.com/@rusacheeee?lang=ro-RO" style='font-size:50px' class="fa-brands fa-tiktok"></a></p>
</div>



@endsection