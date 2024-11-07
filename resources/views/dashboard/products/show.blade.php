@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Event detailpagina</h2>
        <hr>
        <h3>{{$product->name}}</h3>
        <div class="buttons">
            <a href="{{route('products.edit', $product->id)}}" class="btn btn-info">Aanpassen</a>
            <form action="{{route('products.destroy', $product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Verwijderen" class="btn btn-danger">
            </form>
        </div>
    </div>


@endsection


    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

