@extends('layouts.app')

@section('content')

<style>
     body{
        background:black;
        margin:0px;
    }
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
    .page {
        min-height: 20vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-box {
        width: 75%;
        min-height: 650px;
        background: rgb(0, 0, 0);
        padding: 25px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr 1fr;
        gap: 35px 20px;
        align-items: center;
        margin-top: 25px;
    }
    input, textarea, button, select{
        width: 100%;
        height: 100px;
        text-align: center;
        padding: 16px 32px;
        font-size: 20px;
        color: #ea00ff;
        background: transparent;
        border: 0;
    }
    textarea {
        resize: none;
        padding-top: 40px;
    }

    button {
        height: 70px;
        cursor: pointer;
    }
     .btn12{
        background:linear-gradient(135deg,#ff00ea,#7b00ff);
    color:white;
    text-decoration:none;
    padding:18px 36px;
    border-radius:25px;
    cursor: pointer;
    grid-column: 3;
    justify-self: center;
    }
    .alege{
        background: black;
    }
</style>

    <h1>Creare Produs</h1>
        <div class="page">
            @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif
        <form class="form-box" action="{{ route('produse.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="form-grid">
                
                <input type="text" name="title" class="nume" placeholder="Nume">

                <textarea name="description" class="desc"  placeholder="Descriere"></textarea>
               
                <input type="number"
    name="price"
    class="price"
    step="0.01"
    min="0"
    placeholder="Price">
                
                <input type="number" name="tickets" class="stock"  placeholder="Stock">

                <input type="number"
       name="discount"
       placeholder="Discount"
       >

                <select name="categoriis_id" class ="form-control">
                    <option value="">Alege categoria</option>
                    @foreach ($categorii as $categorie)
                    <option class="alege" value="{{ $categorie->id }}">
                        {{$categorie->nameCategory}}
                    </option>
                    @endforeach
                </select>
    
                <input type="file" name="images[]" class="img" multiple placeholder="Images">
        
                <button class="btn12 btn-success">
                     Save
                </button>
           </div>

        </form>
        </div>

    

@endsection