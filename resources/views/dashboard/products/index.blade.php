@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Onze Producten</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                <div class="card-image" style="height: 200px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-100 h-100 object-fit-cover">
                </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted">{{ $product->merk }}</p>
                        <p class="card-text">€{{ $product->price }}</p>
                        <p class="card-text">{{ $product->description}}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Bekijk Product</a>
                        <a href="{{ route('products.edit', $product->id) }}"class="btn btn-primary">Pas product aan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
