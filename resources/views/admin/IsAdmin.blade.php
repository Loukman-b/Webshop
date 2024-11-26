@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beheer Gebruikers</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.updateUsers') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Is Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="checkbox" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->

