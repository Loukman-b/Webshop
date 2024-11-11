@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Product Detailpagina</h2>
        <hr>
        
        <h3>Naam:{{ $product->name }}</h3>
        <p><strong>Merk:</strong> {{ $product->merk }}</p>
        <p><strong>Prijs:</strong> €{{ $product->price }}</p>
        <p><strong>Beschrijving:</strong> {{ $product->description }}</p>
        
        <div class="buttons d-flex mt-4">
            <!-- Link naar de edit-pagina -->
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info me-2">Aanpassen</a>
            
            <!-- Verwijderingsformulier -->
            <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                @csrf
                @method('DELETE')
                <input type="submit" value="Verwijderen" class="btn btn-danger">
            </form>
        </div>
    </div>
@endsection
