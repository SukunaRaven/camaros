@extends('layouts.app')

@section('content')
    <h3>Admin - Camaro beheer</h3>
    <table class="table">
        <thead><tr><th>#</th><th>Naam</th><th>Jaar</th><th>Uploader</th><th>Acties</th></tr></thead>
        <tbody>
        @foreach($camaros as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->year }}</td>
                <td>{{ $c->uploader->name }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.camaro.destroy', $c) }}">@csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Verwijder?')">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $camaros->links() }}
@endsection
