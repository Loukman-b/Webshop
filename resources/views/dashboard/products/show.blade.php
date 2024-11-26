@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Product Details</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-image" style="height: 200px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="text-muted"><strong>Merk:</strong> {{ $product->merk }}</p>
                    <p><strong>Prijs:</strong> €{{ $product->price }}</p>
                    <p class="card-text"><strong>Beschrijving:</strong> {{ $product->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Pas product aan</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Verwijderen" class="btn btn-danger">
                    </form>
                    <a href="{{ route('products.index', $product->id) }}" class="btn btn-secondary">Annuleer</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
