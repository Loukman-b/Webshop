@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Winkelwagen</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cartItems) > 0)
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
                    @foreach ($cartItems as $item)
                        <tr data-id="{{ $item['id'] }}">
                            <td>{{ $item['name'] }}</td>
                            <td>€{{ number_format($item['price'], 2) }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-secondary update-quantity" data-action="decrease">−</button>
                                <input type="number" class="quantity-input text-center" value="{{ $item['quantity'] }}" min="1" style="width: 50px;" readonly>
                                <button type="button" class="btn btn-sm btn-outline-secondary update-quantity" data-action="increase">+</button>
                            </td>
                            <td class="item-total">€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="text-right">
            <h3>Totaal: <span id="cart-total">€{{ number_format($totalPrice, 2) }}</span></h3>
        </div>
    @else
        <p>Je winkelwagen is leeg!</p>
    @endif
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".update-quantity").forEach(button => {
        button.addEventListener("click", function() {
            let row = this.closest("tr");
            let productId = row.getAttribute("data-id");
            let input = row.querySelector(".quantity-input");
            let totalCell = row.querySelector(".item-total");
            let cartTotal = document.getElementById("cart-total");
            let pricePerItem = parseFloat(row.querySelector("td:nth-child(2)").textContent.replace("€", "").replace(",", "."));

            let currentQuantity = parseInt(input.value);
            let action = this.getAttribute("data-action");

            let newQuantity = action === "increase" ? currentQuantity + 1 : Math.max(1, currentQuantity - 1);
            input.value = newQuantity;

            // Update totaalprijs voor het item
            let newTotalPrice = (pricePerItem * newQuantity).toFixed(2);
            totalCell.textContent = "€" + newTotalPrice.replace(".", ",");

            // Stuur update naar de server via AJAX
            fetch("{{ route('cart.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ product_id: productId, quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                // Update totaalbedrag winkelwagen
                cartTotal.textContent = "€" + data.newTotal.toFixed(2).replace(".", ",");
            })
            .catch(error => console.error("Fout bij updaten winkelwagen:", error));
        });
    });
});
</script>
@endsection
