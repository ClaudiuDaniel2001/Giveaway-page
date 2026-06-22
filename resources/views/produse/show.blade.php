@extends('layouts.app')

@section('content')
<style>
    .container{ display:flex;
    justify-content:center;
    gap:40px;
    margin-top:10px;
    }
    h1{
        font-size: 50px;
        font-weight: 900;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        
    }
    .dis{
        padding: 25px;
        margin-left: 40px;
       
    }
    del{
        font-size: 25px;
    color: rgb(255, 0, 234);
    margin-right:10px;
}

span{
    font-size: 25px;
    color:#000000;
    font-weight:bold;
}

strong{
    font-size: 20px;
    color:white;
    background:#ff00ea;
    padding:4px 8px;
    border-radius:10px;
}
    .carousel{
    position:relative;
    width:500px;
    height:400px;
    overflow:hidden;
    border-radius:20px;
}

.slide{
    display:none;
    width:100%;
    height:100%;
    object-fit:cover;
}

.slide.active{
    display:block;
}

.prev,
.next{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    color:white;
    border:0;
    font-size:35px;
    cursor:pointer;
}

.prev{
    left:10px;
}

.next{
    right:10px;
}
.left-side{
    width:500px;
}

.descriere{
    margin-top:20px;
    background:white;
    padding:20px;
    border-radius:15px;
    color:black;
    line-height:1.6;
}

.right-side{
    width:500px;
}
.progress-box{
    margin-left: 60px;
    width:500px;
    background:transparent;
    padding:25px;
    border-radius:8px;
    position:relative;
}

.progress{
    width:100%;
    height:16px;
    background:#ddd;
    border-radius:4px;
    overflow:hidden;
}

.progress-fill{
    height:100%;
    background:#e91e8f;
}

.percent-badge{
    position:absolute;
    top:15px;
    left:calc({{ $percent ?? 0 }}% - 25px);
    background:#e91e8f;
    color:white;
    width:55px;
    height:55px;
    border-radius:50%;
    font-size:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    font-weight:bold;
}

.progress-info{
    display:flex;
    justify-content:space-between;
    margin-top:10px;
}

.progress-info span{
    color:#e91e8f;
}
.buy{
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
.countdown{
    display:flex;
    gap:15px;
    margin-top:20px;
  
}

.box1{
    width:160px;
    background:#ff1493;
    color:white;
    border-radius:8px;
    text-align:center;
    padding:15px;
    box-shadow:0 2px 8px rgba(0,0,0,.2);
}

.box1 span{
    display:block;
    font-size:42px;
    font-weight:bold;
}

.box1 small{
    font-size:20px;
}
form{
    display: flex;
    justify-content: center;
    margin-top: 20px;
    
}
.cantitate{
    border-radius: 25px;
    padding: 10px 40px;
}
</style>
<body>
<div class="container">
    <div class="left-side">
    <div class="carousel">
    @foreach($produs->images as $image)
        <img src="{{ asset('storage/' . $image->image) }}"
             class="slide {{ $loop->first ? 'active' : '' }}">
    @endforeach

    <button type="button" class="prev" onclick="prevSlide()">‹</button>
    <button type="button" class="next" onclick="nextSlide()">›</button>
    </div>
    <div class="descriere">
        <h3>Descriere</h3>
        <p>{{ $produs->description }}</p>
    </div>
    </div>
 <div class="right-side">
    <h1>{{ $produs->title }}</h1>
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

 @php
    $sold = $produs->tickets_sold;
    $total = $produs->tickets;
    $remaining = $total - $sold;
    $percent = $total > 0 ? ($sold / $total) * 100 : 0;
 @endphp

 <div class="progress-box">

    <div class="percent-badge">
        {{ number_format($percent, 2) }}% <br> SOLD
    </div>

    <div class="progress">
        <div class="progress-fill" style="width: {{ $percent }}%"></div>
    </div>

    <div class="progress-info">
        <div>
            <span>{{ number_format($sold) }}</span> / {{ number_format($total) }}
            <p>Tickets sold</p>
        </div>

        <div>
            <span>{{ number_format($remaining) }}</span>
            <p>Tickets remaining</p>
        </div>
    </div>

  </div>
  <div class="countdown-container">

    <p>
        <strong>Competition ends on:</strong>
        25/07/2026 5:00 pm
    </p>

    <div class="countdown">

        <div class="box1">
            <span id="days">00</span>
            <small>Days</small>
        </div>

        <div class="box1">
            <span id="hours">00</span>
            <small>Hours</small>
        </div>

        <div class="box1">
            <span id="minutes">00</span>
            <small>Minutes</small>
        </div>

        <div class="box1">
            <span id="seconds">00</span>
            <small>Seconds</small>
        </div>

    </div>

</div>
  @auth
      
  @if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form action="{{ route('order.store', $produs->id) }}" method="POST">
    @csrf

    <input class="cantitate" placeholder="Tickets" type="number" name="tickets" min="1"
           max="{{ $produs->tickets - $produs->tickets_sold }}">

    @if($produs->tickets_sold >= $produs->tickets)
        <button class="buy" disabled>SOLD OUT</button>
    @else
        <button class="buy" type="submit">Buy Now</button>
    @endif
</form>

@endauth
@guest
    <a href="/login" class="buy">Loghează-te ca să cumperi</a>
@endguest
 </div>


{{--<p>Bilete disponibile: {{ $produs->tickets - $produs->tickets_sold }}</p>--}}


<script>
let index = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(i){
    slides.forEach(slide => slide.classList.remove('active'));
    slides[i].classList.add('active');
}

function nextSlide(){
    index = (index + 1) % slides.length;
    showSlide(index);
}

function prevSlide(){
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
}


const endDate = new Date("2026-07-25 17:00:00").getTime();

setInterval(function(){

    const now = new Date().getTime();

    const distance = endDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24))
        / (1000 * 60 * 60)
    );

    const minutes = Math.floor(
        (distance % (1000 * 60 * 60))
        / (1000 * 60)
    );

    const seconds = Math.floor(
        (distance % (1000 * 60))
        / 1000
    );

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

},1000);


</script>
</body>
@endsection