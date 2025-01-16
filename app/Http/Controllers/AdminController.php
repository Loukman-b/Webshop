<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Haal alle gebruikers op
        return view('admin.IsAdmin', compact('users')); // Verwijs naar je admin view
    }

    public function update(Request $request)
{
    // Loop door alle gebruikers in de request
    foreach ($request->input('users', []) as $userData) {
        $user = User::findOrFail($userData['id']);

        // Controleer of de gebruiker de naam 'admin' heeft
        if ($user->id == 1) {
            // Voorkom dat de admin teruggezet kan worden
            continue; // Sla de update voor deze gebruiker over
        }

        // Update de is_admin status voor andere gebruikers
        $user->is_admin = isset($userData['is_admin']) ? 1 : 0;
        $user->save();
    }

    return redirect()->route('admin.users')->with('success', 'Gebruikers succesvol bijgewerkt.');
}

    

}
