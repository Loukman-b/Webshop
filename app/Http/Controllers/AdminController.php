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
        $user = User::findOrFail($request->user_id); // Vind de gebruiker
        $user->is_admin = $request->has('is_admin'); // Zet de admin-status op basis van checkbox
        $user->save(); // Sla de wijzigingen op

        return redirect()->route('admin.users')->with('success', 'Gebruiker succesvol bijgewerkt.');
    }
}
