<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <title>RGIVEAWAY</title>

        <!--Fonts 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        body{
            margin:0;
    min-height:100vh;
    display:flex;
    flex-direction:column;
        }
        .navbar{
            background: url('/storage/3d-black-triangles-black-background-abstract-image-texture-pattern-wallpaper-cover_867671-14062.avif');
    display:flex;
    align-items:center;
    justify-content: space-between;
    padding:0 40px;
    width: 100%;
    height: 90px;
    box-sizing: border-box;
         }
         .btn10{
             background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:9px 18px;
    border-radius:20px;
    cursor: pointer;
    justify-self: center;
         }
         .btn2{
             background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:9px 18px;
    border-radius:20px;
    cursor: pointer;
    justify-self: center;
         }
         .btn3{
             background:linear-gradient(135deg,#f8d4f5,#7b00ff);
    color:rgb(255, 255, 255);
    text-decoration:none;
    padding:9px 18px;
    border-radius:25px;
    cursor: pointer;
    justify-self: center;
         }

        .logo{
    width:220px;
    height: auto;
         }
         .container1{
            display:flex;
    align-items:center;
    gap:25px;
    color: white;
         }
         .container a{
    color:white;
    text-decoration:none;
    font-size:18px;
        }
        main{
           flex:1
        }

         .footer{
     background: url('/storage/3d-black-triangles-black-background-abstract-image-texture-pattern-wallpaper-cover_867671-14062.avif');
    padding:25px 60px 10px;
}

.footer-content{
    display:grid;
    grid-template-columns:1fr 1fr 1fr;
    align-items:center;
}
.logo2{
    width: 220px;
}

.footer-links{
    display:flex;
    flex-direction:column;
    gap:15px;
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

.social{
    display:flex;
    gap:25px;
    justify-content:center;
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

.last{
    text-align:center;
    margin-top:20px;
    color:#ff00ea;
}
      
       
    </style>
    <body>
        <nav class="navbar">

    <a href="/">
        <img src="{{ asset('storage/logo.png') }}" class="logo">
    </a>

    <div class="container1">

       @auth

    @if(trim(auth()->user()->role) === 'admin')

        <a href="/admin/categorii" class="bt">Produse</a>
        <a href="/admin/order" class="bt">Orders</a>

    @else

        <a href="/order" class="btn">Comenzile Mele</a>
        <a href="/contact" class="btn">Contact</a>

    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn10">Logout</button>
    </form>
    @endauth


@guest
    <a href="/login" class="btn2">Login</a>
    <a href="/register" class="btn3">Register</a>
@endguest



    </div>

</nav>
        <main class="container">
           
            @if(session('success'))
            <div class="alert alert-success">

                {{ session('success')}}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">

                {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
        <footer class="footer">
           
            <div class="footer-content">
              <div>
                   <a href="/" class="logo1">
                   <img src="{{ asset('storage/logo.png') }}" class="logo2">
                   </a>
              </div>
    

       <div class="footer-links">
        <a href="/terms">Terms</a>
        <a href="/privacy">Privacy</a>
        <a href="/contact">Contact</a>
       </div>

      <div class="social">
       <a href="https://www.facebook.com/claudiu.alexandroae" clsss="facebook" style='font-size:50px' class='fab'>&#xf09a;</a>
       <a href="https://www.instagram.com/claudiu_daniel.11/?hl=ro" style='font-size:50px' class='fab'>&#xf16d;</a>
       <a href="https://www.tiktok.com/@rusacheeee?lang=ro-RO" style='font-size:50px' class="fa-brands fa-tiktok"></a>
      </div>
    </div>
    
    
    <p class="last">© 2025 RGIVEAWAY. All rights reserved.</p>
            
</footer>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@yield('scripts')
    </body>
</html>
