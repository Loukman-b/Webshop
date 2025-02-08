<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Toon de winkelwagenpagina
public function index()
{
    // Haal de winkelwagenitems op uit de sessie
    $cartItems = session()->get('cart', []);

    // Bereken de totale prijs van de producten in de winkelwagen
    $totalPrice = !empty($cartItems)
        ? array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems))
        : 0;

    return view('cart.index', compact('cartItems', 'totalPrice'));
}


    // Voeg een product toe aan de winkelwagen
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        // Controleer of het product al in de winkelwagen zit
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += 1;
        } else {
            // Voeg het product toe aan de winkelwagen met hoeveelheid 1
            $cart[$request->product_id] = [
                'id' => $request->product_id,
                'name' => $request->product_name,
                'price' => $request->product_price,
                'quantity' => 1,
                'image' => $request->product_image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product toegevoegd aan winkelwagen!');
    }

    // Verwijder een product uit de winkelwagen
    // Verwijder een product uit de winkelwagen
public function remove($productId)
{
    $cart = session()->get('cart', []); // Haal de winkelwagen op uit de sessie

    // Controleer of het product bestaat in de winkelwagen
    if (isset($cart[$productId])) {
        unset($cart[$productId]); // Verwijder het product uit de winkelwagen
        session()->put('cart', $cart); // Zet de bijgewerkte winkelwagen terug in de sessie
    }

    return redirect()->route('cart.index')->with('success', 'Product verwijderd uit de winkelwagen.');
}


    // Update de hoeveelheid van een product in de winkelwagen
    public function updateQuantity(Request $request)
    {
        $cart = session()->get('cart', []);

        // Controleer of de request data geldig is
        if (!is_array($request->quantity)) {
            return redirect()->back()->with('error', 'Ongeldige invoer voor hoeveelheid.');
        }

        foreach ($request->quantity as $id => $quantity) {
            if (isset($cart[$id])) {
                if ($quantity > 0) {
                    $cart[$id]['quantity'] = $quantity;
                } else {
                    unset($cart[$id]); // Verwijder als de hoeveelheid 0 is
                }
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Hoeveelheden bijgewerkt.');
    }
}
