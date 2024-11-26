@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-5">
        <h1 class="display-4">Welkom bij Onze Webshop!</h1>
        <p class="lead">Bekijk onze producten en plaats een bestelling eenvoudig.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-image" style="height: 200px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted">{{ $product->merk }}</p>
                        <p class="card-text">€{{ $product->price }}</p>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary">Bestel</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
