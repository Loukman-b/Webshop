@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beheerder pagina</h1>
    <h2>Product aanpassen</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')


        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ $product->merk }}" required>
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea name="description" cols="30" rows="10" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="number" min="0" step="any" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="content">Inhoud</label>
            <input type="number" name="content" step="any" min="0" class="form-control" value="{{ $product->content }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $product->type }}" required>
        </div>

        <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="scent_similarities">Geur overeenkomsten</label>
            <input type="text" name="scent_similarities" class="form-control" value="{{ $product->scent_similarities }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Voorraad</label>
            <input type="number" name="stock" min="0" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categorie</label>
            <input type="number" name="category_id" class="form-control" value="{{ $product->category_id }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
