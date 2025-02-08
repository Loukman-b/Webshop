@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Winkelwagen</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cartItems) > 0)
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th>Aantal</th>
                            <th>Totaal</th>
                            <th>Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (!empty($cartItems))
    @foreach ($cartItems as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
            <td>
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                    <button type="submit" class="btn btn-danger btn-sm">Verwijder</button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">Je winkelwagen is leeg.</td>
    </tr>
@endif

                    </tbody>
                </table>
            </div>
            
            <div class="text-right">
                <h3>Totaal: €{{ $totalPrice }}</h3>
            </div>
        </form>
    @else
        <p>Je winkelwagen is leeg!</p>
    @endif
</div>
@endsection
